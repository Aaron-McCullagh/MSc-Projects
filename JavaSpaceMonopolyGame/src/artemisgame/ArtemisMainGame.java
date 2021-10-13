/**
 * 
 */
package artemisgame;

import java.util.ArrayList;
import java.util.Collections;
import java.util.InputMismatchException;
import java.util.List;
import java.util.Scanner;

/**
 * Class controls the game play - creates, starts and end messages
 * 
*/
public class ArtemisMainGame {

	public static List<Player> playerList = new ArrayList<Player>();
	public static Scanner scanner = new Scanner(System.in);

	private static int round = 2017;
	private static boolean isGameOver = false;
	private static boolean isGameWon = false; // All elements are fully developed
	private static boolean isQuit = false;
	private static boolean isBankrupt = false;
	private static boolean isTurnOver = false;
	private static Player activePlayer;
	private static Square activeSquare;
	private static ElementSquare activeElementSquare;
	private static List<String> eventHistory = new ArrayList<>();
	private static int passStartResource = 200; // funding received for passing go

	/**
	 * main method
	 * 
	 * @param args
	 */
	public static void main(String[] args) {
		playGame();

	}
	
	/**
	 * playGame method - when invoked by main method will start game.
	 */

	public static void playGame() {

		// Create Game - Board, Player
		System.out.println("Creating Game...");
		Board.createBoard();
		Player.addPlayers();

		// Game Starts - Prelog - own method
		System.out.println();
		System.out.println("Starting Game\n");
		System.out.printf(
				"It is currently the year %d, and PROJECT ARTEMIS has commenced; your mission to the moon starts now!\n\n",
				round);

		// Game Loop
		do {

			// round++;
			// Loop through players
			for (int loop = 0; loop < playerList.size(); loop++) {
				isTurnOver = false;
				// System.out.println("\nRound : " + round + " Turn : " + turn);
				System.out.println("Year : " + round + " Turn : " + (loop + 1) + " of " + playerList.size());

				// Active Player Information
				activePlayer = playerList.get(loop);
				activeSquare = activePlayer.getPosition();

				System.out.println(activePlayer.getName() + " is starting their turn.");
				activePlayer.displayPlayerResourceAndPosition();

				// Show player choices
				showTurnMenu();

				// Checking if game over - Break the loop
				if (isBankrupt || isQuit || isGameWon) {
					isGameOver = true;
					break;
				}
			}

			round++; // increment year at round end
			System.out.printf("Round over. The year is now %s.\n", round); // diaglogue to indicate round over

		} while (!isGameOver);

		// Game End
		System.out.println("GAME OVER");

		if (!isGameWon) {
			System.out.println("You've failed on your mission");
			// displayHeadlines(); // Test headlines if you don't want to play full game
			// Display player info
			displayFinalPlayerOrder();
		}

		if (isGameWon) {
			System.out.println(
					"You've fully developed all elements, Artemis is ready to launch and your mission was successful");
			// Display Major Events
			displayHeadlines();
			// Display player info
			displayFinalPlayerOrder();
		}

		scanner.close();
	} // End of playGame

	/**
	 * Menu to show turn player options split in two stages Both menus offer develop
	 * square and quit game, but 1st offer roll dice and second offers end turn
	 */
	public static void showTurnMenu() {
		System.out.println();
		int option = -1;
		System.out.println("Select an option ");
		do { // First do while loop does not include the option to end turn
			System.out.println("1. Roll Dice");
			System.out.println("2. Review Board");
			System.out.println("3. Develop Square");
			System.out.println("4. Quit Game");
			System.out.println("Enter option ...");

			boolean OK = false;
			do {
				try {
					option = scanner.nextInt();
					OK = true;
				} catch (InputMismatchException e) {
					System.out.println("Invalid entry, Try again...");
					OK = false;
					scanner.next();
				}
			} while (!OK);

			switch (option) {
			case 1:
				// Move Player / Roll dice
				movePlayer();

				// Check if bankrupt
				if (activePlayer.getResource() < 0) {
					isBankrupt = true;
					isTurnOver = true;
					System.out.println(activePlayer.getName() + " is bankrupt");
				}
				break;
			case 2:
				// View the board
				Board.displayBoard();
				break;
			case 3:
				// Develop Square Method
				developSquare();
				// Check if game is won due to all squares being fully developed
				checkIfGameWon();
				if (!isGameWon) { // If game is won loop would break
					option = 2; // Prevents loop from breaking if player hasn't rolled dice
				}
				break;
			case 4:
				// Quit Game Method
				quitGame();
				if (!isQuit) { // If player chooses not to quit
					option = 2; // Prevents loop from breaking if player hasn't rolled dice
				}
				break;
			default:
				System.out.println("Invalid option, Try again...");
				option = 2; // To prevent breaking loop
			}
		} while (option == 2); // Will loop Develop method

		if (!isTurnOver) { // Checks if turn can continue
			System.out.println();
			System.out.println("What's your next action, " + activePlayer.getName() + "?");
			// note, player included above as a reminder whose go it is e.g. after
			// offToNextPLayer occurs
			do {
				System.out.println("1. End Turn"); // End Turn option replaces the roll dice
				System.out.println("2. Review Board");
				System.out.println("3. Develop Square");
				System.out.println("4. Quit Game");
				System.out.println("Enter option ...");

				boolean OK = false;
				do {
					try {
						option = scanner.nextInt();
						OK = true;
					} catch (InputMismatchException e) {
						System.out.println("Invalid entry, Try again...");
						OK = false;
						scanner.next();
					}
				} while (!OK);

				switch (option) {
				case 1:
					endTurn();					
					break;
				case 2:
					Board.displayBoard();
					break;
				case 3:
					developSquare();
					checkIfGameWon();
					break;
				case 4:
					quitGame();
					break;
				default:
					System.out.println("Invalid option, Try again...");
				}
			} while (!isTurnOver);
		}
	}

	/**
	 * Quit game
	 */
	public static void quitGame() {
		System.out.println("Are you sure you want to quit the game?");
		int quitGame = confirmChoice();
		if (quitGame == 1) {
			isQuit = true;
			isTurnOver = true;
			System.out.println(activePlayer.getName() + " is quitting the game.");
		}
	}
	
	 /**
	 * End Turn
	 */
	public static void endTurn() {
		System.out.println("Are you sure you want to end your turn?");
		int endTurn = confirmChoice();
		if (endTurn == 1) {
			isTurnOver = true;
			System.out.println("End of turn");
		}
	}


	/**
	 * Move player based on Dice Roll
	 */
	public static void movePlayer() {
		// Starting Square
		int startingSquare = activeSquare.getBoardIndex();
		// Player rolls dice
		int dice1 = new Dice().rollDice();
		int dice2 = new Dice().rollDice();
		int diceRoll = dice1 + dice2;

		// Calculate new square
		int newSquare = (startingSquare + diceRoll) % Board.BOARD_SIZE;

		System.out.println("You've rolled a " + dice1 + " and a " + dice2 + " totalling at " + diceRoll);

		// Set Player new position and new activeSquare
		activePlayer.setPosition(Board.gameBoard.get(newSquare));
		activeSquare = activePlayer.getPosition();

		// Check if pass start
		if (newSquare <= startingSquare) {
			if (newSquare == 0) {
				System.out.println(activePlayer.getName() + ", you've landed on Start (Square " + newSquare
						+ "), and have been granted $" + passStartResource + "m additional funding");
			} else {
				System.out.println(
						"You've passed Start, and have been granted $" + passStartResource + "m additional funding");
			}
			activePlayer.increaseResource(passStartResource);
			System.out.printf(activePlayer.getName() + "'s current Funding: $%dm\n", activePlayer.getResource());
		}

		// Check if landed on rest
		if (activeSquare.isDayOff()) {
			System.out.println(activePlayer.getName() + ", you've landed on " + activeSquare.getName() + " (Square "
					+ newSquare + "). Time to throw your feet up!");
		}

		// Check if element square
		if (activeSquare instanceof ElementSquare) {
			activeElementSquare = (ElementSquare) activeSquare;
			System.out.println(activePlayer.getName() + ", you've landed on " + activeSquare.getName() + " (Square "
					+ newSquare + ")");
			// check if owned
			if (activeElementSquare.isOwned()) {
				Player owner = activeElementSquare.getOwner();
				System.out.println("Current owner of this Element: " + owner.getName());
				// Check owner
				if (!activeElementSquare.getOwner().equals(activePlayer)) {
					// pay Rent
					payRent();
				} else {
					System.out.println("You've already taken charge");
				}
			} else {
				System.out.println("No one has taken charge yet.");
				// Purchase
				purchaseSquare(activePlayer);
			}
		}
	}

	/**
	 * Pay rent to square owner from active Player
	 */
	public static void payRent() {
		Player owner = activeElementSquare.getOwner();
		int rent = activeElementSquare.calculateRent();

		// Capture players name as vars so repeated calls not needed
		String ownersName = owner.getName();
		String activeName = activePlayer.getName();

		System.out.println("\nThe owner of this square must decide whether to charge the active player or not...");
		System.out.printf("%s's funding : $%dm \n%s's funding : $%dm\n", ownersName, owner.getResource(), activeName,
				activePlayer.getResource());
		System.out.printf("%s, do you wish to siphon $%dm of funding from %s?\n", ownersName, rent, activeName);
		int pay = confirmChoice();
		if (pay == 1) {
			owner.increaseResource(rent);
			activePlayer.decreaseResource(rent);
			System.out.println("Funding siphoned! Updated Player Funding:");
			System.out.printf("%s's funding: $%dm\n", ownersName, owner.getResource());
			System.out.printf("%s's funding: $%dm\n", activeName, activePlayer.getResource());
			eventHistory.add("In the year " + round + ", " + ownersName + " siphoned $" + rent + "m of funding from "
					+ activeName + ". Cheeky!");
		} else {
			System.out.println("Offer Declined, No change in Funding");
		}
	}

	/**
	 * Purchase Square / Take Charge
	 * 
	 * @param player - active player
	 */
	public static void purchaseSquare(Player player) {

		System.out.println(
				"\n" + activeElementSquare.getName() + " is part of the " + activeElementSquare.displaySystem());
		checkSystemOwnership(activeElementSquare.getSystem(), player); // Informs player of who owns what from this
																		// system - make informed choice on whether to
																		// buy or not
		System.out.printf("The funding required to take charge of %s is $%dm,\n", activeElementSquare.getName(),
				activeElementSquare.getCost());

		System.out.println("\nWill you invest and take charge?");
		int purchase = confirmChoice();
		if (purchase == 1) {
			if (player.getResource() < activeElementSquare.getCost()) {
				System.out.println("You do not have enough Funding to take charge");
				// Offer to next player
				offerToNextPlayer(player);
			} else {
				activeElementSquare.setOwnerAndIsOwned(player);
				player.decreaseResource(activeElementSquare.getCost());
				player.addOwnedElement(activeElementSquare);
				System.out.println("You have supplied funding and have taken charge");
				System.out.println(player.getName() + " is now in charge of " + activeElementSquare.getName());
				// Add headline to event history
				eventHistory.add("In the year " + round + ", " + player.getName() + " took charge of "
						+ activeElementSquare.getName());
				System.out.printf("Your current Funding: $%dm\n", player.getResource());
			}
		} else {
			// Offer to next player
			offerToNextPlayer(player);
		}
	}

	/**
	 * If active player is unable to purchase will offer square to next player
	 * 
	 * @param player - active player
	 */
	public static void offerToNextPlayer(Player player) {
		Player nextPlayer = playerList.get((playerList.indexOf(player) + 1) % playerList.size());
		if (!activePlayer.equals(nextPlayer)) { // Offers to next player until brought or return to active player
			System.out.println("Offer square to Next Player:");
			nextPlayer.displayPlayerNameAndResource();
			purchaseSquare(nextPlayer); // Recursion
		}

	}

	/**
	 * Develop Square
	 */
	public static void developSquare() {
		// Display Owned Elements
		System.out.println("Elements owned by you....");
		if (!activePlayer.getOwnedElements().isEmpty()) {
			// print table header
			System.out.printf("\n%-15s %-35s %-35s %-15s %-10s\n", "SQUARE", "NAME", "SYSTEM", "DEVS COMPLETE",
					"DEV COST");
			// Sort by Index
			Collections.sort(activePlayer.getOwnedElements(), new CompareIndex());
			for (ElementSquare square : activePlayer.getOwnedElements()) {
				square.displayOwnedElementInfo();
			}
			// Select Element to Develop
			System.out.println("\nYour current funding is $" + activePlayer.getResource() + "m");
			System.out.println("Enter the number of the element square you wish to develop");
			System.out.println("(or 0 to return to menu)...");
			int selectedIndex = -1;
			boolean OK = false;
			do {
				try {
					selectedIndex = scanner.nextInt();
					OK = true;
					if (selectedIndex == 6) {
						System.out.println("Invalid selection, square cannot be developed");
						OK = false;
					}
					if (selectedIndex < 0 || selectedIndex >= Board.gameBoard.size()) {
						System.out.println("Index selected out of bounds, try again...");
						OK = false;
					}
				} catch (InputMismatchException e) {
					System.out.println("Invalid entry, Try again...");
					OK = false;
					scanner.next();
				}
			} while (!OK);

			if (selectedIndex == 0) {
				System.out.println("returning to menu");
			} else {

				ElementSquare squareToDevelop = (ElementSquare) Board.gameBoard.get(selectedIndex);

				boolean isSystemComplete = false;
			
				// Is system complete / owned by you
				for (Square square : Board.gameBoard) {
					if (square instanceof ElementSquare) { // Check if element
						if (((ElementSquare) square).getSystem().equals(squareToDevelop.getSystem())) { // System to
																										// check
							if (((ElementSquare) square).isOwned()) { // Check if owned
								if ((((ElementSquare) square).getOwner()).equals(activePlayer)) {
									
									isSystemComplete = true;
									
								} else {
									isSystemComplete = false;
									break;
								}
							} else {
								isSystemComplete = false;
								break;
							}
						}
					}
				}

				if (isSystemComplete) {
					// Check isFullyDeveloped
					if (!squareToDevelop.isFullyDeveloped()) {
						// Confirm development
						if (squareToDevelop.getNumberOfDevelopments() == 3) {
							System.out.printf("It costs $%dm to complete a major development on this element, ",
									squareToDevelop.getCostOfDevelopment());
						} else {
							System.out.printf("This element costs $%dm to develop, ",
									squareToDevelop.getCostOfDevelopment());
						}
						System.out.println("Will you develop?");
						int develop = confirmChoice();
						if (develop == 1) {
							if (activePlayer.getResource() < squareToDevelop.getCostOfDevelopment()) {
								System.out.println("You do not have enough Funding to complete development");
							} else {
								squareToDevelop.incrementNumberOfDevelopments();
								activePlayer.decreaseResource(squareToDevelop.getCostOfDevelopment());
								System.out.printf("Updated Resources: $%dm\n", activePlayer.getResource());
								// Add headline to event history
								if (squareToDevelop.isFullyDeveloped()) {
									eventHistory.add("In the year " + round + ", " + activePlayer.getName()
											+ " completed a Major Development, " + activeElementSquare.getName()
											+ " was fully developed,");
								} else {
									eventHistory.add("In the year " + round + ", " + activePlayer.getName()
											+ " developed " + activeElementSquare.getName());
								}
							}
						} else {
							System.out.println("Decided not to develop");
						}
					} else {
						System.out.println("Square is fully Developed");
					}

				} else {
					
					if(squareToDevelop.getOwner() == activePlayer) {
						System.out.println("You must own all other elements from the " + squareToDevelop.displaySystem() + " System to develop the " + squareToDevelop.getName() + "!");
					} else {
						System.out.println("You do not own square no. " + selectedIndex + "!");
					}
				}
			}

		} else {
			System.out.println("Currently no squares owned");
		}
	}

	/**
	 * Check if Game is won when all elements are fully developed
	 */
	public static void checkIfGameWon() {
		for (Square square : Board.gameBoard) {
			if (square instanceof ElementSquare) { // Check if element
				if (((ElementSquare) square).isFullyDeveloped()) { // check if fully Developed
					isGameWon = true;
					isTurnOver = true;
				} else {
					isGameWon = false;
					isTurnOver = false;
					break; // if an element isn't fully developed loop will break
				}
			}
		}
	}

	/**
	 * Scanner to check player choice
	 * 
	 * @return player choice 1. Yes or 2. No
	 */
	public static int confirmChoice() {
		System.out.println("1. Yes or 2. No");
		int choice = -1;
		boolean OK = false;
		do {
			do {
				try {
					choice = scanner.nextInt();
					OK = true;
				} catch (InputMismatchException e) {
					System.out.println("Invalid entry, Try again...");
					OK = false;
					scanner.next();
				}
			} while (!OK);

			switch (choice) {
			case 1:
			case 2:
				break;
			default:
				System.out.println("Invalid choice, Try again...");
				choice = 0;
			}
		} while (choice == 0);
		return choice;
	}

	/**
	 * Display all the headlines - when purchased and fully developed
	 */
	public static void displayHeadlines() {
		System.out.println("Headlines:");
		// Display Event History
		for (String event : eventHistory) {
			System.out.println(event);
		}
		System.out.println("It is the year " + round + " and you have completed your mission");
	}

	/**
	 * Displays the players ordered by resource
	 */
	public static void displayFinalPlayerOrder() {
		System.out.println("\nFinal Standings:");
		Collections.sort(playerList, new CompareResources());
		for (Player player : playerList) {
			System.out.println();
			player.displayFinalPlayerInfo();
		}
	}

	/**
	 * Checks all Squares belonging to a given system and determines who owns what
	 * elements Used to inform player before purchasing an element
	 * 
	 * @param systemToCheck  - what Systems is being checked
	 * @param potentialOwner - the Player that may be purchasing this space
	 * 
	 * @author Thomas Scott
	 */
	public static void checkSystemOwnership(Systems systemToCheck, Player potentialOwner) {

		boolean noElementsFromSystemOwned = true;

		for (Square square : Board.gameBoard) {
			if (square instanceof ElementSquare) {
				ElementSquare elementSquare = (ElementSquare) square;
				if (elementSquare.getSystem() == systemToCheck && elementSquare.isOwned()
						&& elementSquare.getOwner() != potentialOwner) {

					noElementsFromSystemOwned = false;

					System.out.println("Warning! Another player " + elementSquare.getOwner().getName()
							+ " is in charge of " + elementSquare.getName() + " from this System!");

				} else if (elementSquare.getSystem() == systemToCheck && elementSquare.isOwned()
						&& elementSquare.getOwner() == potentialOwner) {

					noElementsFromSystemOwned = false;

					System.out.println("You are also in charge of " + elementSquare.getName() + " from this System.");

				}

			}
		}

		if (noElementsFromSystemOwned) {
			System.out.println("No other elements from this System have been taken charge of yet.");
		}

	}

}

/**
 * 
 */
package artemisgame;

import java.util.ArrayList;
import java.util.Collections;
import java.util.InputMismatchException;
import java.util.List;

/**
 * @author Andrew
 *
 */
public class Player {
	public static final int MAX_PLAYERS = 4;
	public static final int MIN_PLAYERS = 2;
	private final static int INITIAL_RESOURCE = 800;

	private String name;
	private int resource;
	private Square position;
	private List<ElementSquare> ownedElements;

	public Player(String name) {
		this.name = name;
		this.resource = INITIAL_RESOURCE;
		this.setPosition(Board.gameBoard.get(0)); // Set to Start
		this.ownedElements = new ArrayList<ElementSquare>();
	}

	/**
	 * @return the name
	 */
	public String getName() {
		return name;
	}

	/**
	 * @param name the name to set
	 */
	public void setName(String name) {
		this.name = name;
	}

	/**
	 * @return the resource
	 */
	public int getResource() {
		return resource;
	}

	/**
	 * Increase Resource due to rent or passing start
	 * 
	 * @param resource
	 */
	public void increaseResource(int resource) {
		this.resource += resource;
	}

	/**
	 * Decrease Resource due to rent, purchase or development
	 * 
	 * @param resource
	 */
	public void decreaseResource(int resource) {
		this.resource -= resource;
	}

	/**
	 * @return the player position
	 */
	public Square getPosition() {
		return position;
	}

	/**
	 * @param position the resource to set
	 */
	public void setPosition(Square square) {
		this.position = square;
	}

	/**
	 * @return the ownedElements
	 */
	public List<ElementSquare> getOwnedElements() {
		return this.ownedElements;
	}

	/**
	 * @param ownedElements the ownedElements to set
	 */
	public void addOwnedElement(ElementSquare ownedElement) {
		this.ownedElements.add(ownedElement);
	}

	/**
	 * Displays Player info when game has stopped
	 */
	public void displayFinalPlayerInfo() {

		System.out.println("Player : " + name);
		System.out.println("Final resources: $" + resource + "m\nFinal position: " + position.getName());

		if (ownedElements.size() > 0) {

			System.out.println("Elements owned;");

			System.out.printf("%-15s %-35s %-35s %-15s\n", "SQUARE", "NAME", "SYSTEM", "DEVELOPMENTS"); // table header

			Collections.sort(ownedElements, new CompareIndex());
			for (ElementSquare square : ownedElements) {
				square.displayElementEndGameInfo();
				;
			}

		} else {

			System.out.println("No elements owned!");

		}
	}

	/**
	 * Displays resources and position
	 */
	public void displayPlayerResourceAndPosition() {
		System.out.printf("Current Funding: $%dm, Current Position: %s (Square %d)\n", resource, position.getName(),
				position.getBoardIndex());
	}

	/**
	 * Displays name and resources
	 */
	public void displayPlayerNameAndResource() {
		System.out.printf("%s, Current Funding: $%dm\n", name, resource);
	}

	/**
	 * Create new player depending on number of players and assign names
	 */
	public static void addPlayers() {

		System.out.println("Adding Players...");

		int numPlayer = 0;
		String namePlayer;
		// Determine Number of Players
		System.out.println("Please enter the number of players (2-4)");
		while (numPlayer < MIN_PLAYERS || numPlayer > MAX_PLAYERS) {
			boolean OK = false;
			do {
				try {
					numPlayer = ArtemisMainGame.scanner.nextInt();
					OK = true;
				} catch (InputMismatchException e) {
					System.out.println("Invalid entry, Try again...");
					OK = false;
					ArtemisMainGame.scanner.next();
				}

				ArtemisMainGame.scanner.nextLine();
			} while (!OK);

			if (numPlayer < MIN_PLAYERS || numPlayer > MAX_PLAYERS) {
				System.out.println("Invalid entry, Try again...");
			}
		}

		// Create Players
		ArtemisMainGame.playerList = new ArrayList<Player>(numPlayer);
		for (int loop = 1; loop <= numPlayer; loop++) {
			Player player = new Player("Player " + loop);
			ArtemisMainGame.playerList.add(player);
		}

		// Assign player names
		for (int loop = 0; loop < numPlayer; loop++) {
			System.out.println(ArtemisMainGame.playerList.get(loop).getName() + " - Please enter name");
			namePlayer = ArtemisMainGame.scanner.nextLine().trim();
			boolean OK = false;
			do {
				if (namePlayer.isEmpty()) {
					System.out.println("No name entered");
					namePlayer = ArtemisMainGame.scanner.nextLine().trim();					
				} else {
					OK = true;
				}
			} while (!OK);
			
			for (int count = 0; count < ArtemisMainGame.playerList.size(); count++)
				if (namePlayer.equalsIgnoreCase(ArtemisMainGame.playerList.get(count).getName())) {
					do {
						System.out.println("This name is taken try another");
						namePlayer = ArtemisMainGame.scanner.nextLine().trim();						
						boolean nameOK = false;
						do {
							if (namePlayer.isEmpty()) {
								System.out.println("No name entered");
								namePlayer = ArtemisMainGame.scanner.nextLine().trim();								
							} else {
								nameOK = true;
							}
						} while (!nameOK);
					} while (namePlayer.equalsIgnoreCase(ArtemisMainGame.playerList.get(count).getName()));
				
				}
			ArtemisMainGame.playerList.get(loop).setName(namePlayer);
		}
		// Generate Player Order
		Collections.shuffle(ArtemisMainGame.playerList);
		System.out.println("Players and Order Created");

		// Print Player Order
		for (Player player : ArtemisMainGame.playerList) {
			System.out.println(player.name);
		}
	}
	
}

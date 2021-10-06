package p3;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Scanner;
import java.util.SortedMap;
import java.util.TreeMap;

/**
 * Start point for the app. Reads in data from csv file (Rugby players info and
 * the presents a menu with several functions - searches and a thread based
 * write to file.
 * 
 * @author Aaron
 *
 */
public class StartApp {

	// name of the file to be read in
	private final static String FILE_IN = "playerstats.csv";

	// container that holds the players (of type player)
	public static List<Player> players = new ArrayList<Player>();

	/**
	 * Start point for app
	 * 
	 * @param args
	 */
	public static void main(String[] args) {
		
		try {
			readData();
			showMenu();
			
		} catch (Exception exception) {
			// output specific message to user - also could be logged for developers
			System.out.println("Problem - please conatct admin");
			System.out.println(exception.getLocalizedMessage());
		}
	}

	/**
	 * Shows the menu and Coordinates the searches and file write
	 * 
	 * @throws Exception
	 */
	public static void showMenu() throws Exception {
		try (Scanner scanner = new Scanner(System.in);) { 
			System.out.println();

			int option;
			System.out.println("File read of rugby player stats ");
			do {
				System.out.println("1. Display all players");
				System.out.println("2. Display all players from Ireland");
				System.out.println("3. Display the highest point scorer ");
				System.out.println("4. Display all players by height and name");
				System.out.println(
						"5. Display each club (in alphabetical order with the cumulative number of games played in the six nations (Total Matches) by each player from that club ");
				System.out.println(
						"6. Capitalise the Last name and export/write to a new file in a new thread in the format Lastname, first name and country ");
				System.out.println("7. Quit");
				System.out.println("Enter option ...");
				try {
					option = scanner.nextInt();
				} catch (Exception exception) {
					option = 0;
					//  flush buffer
					scanner.nextLine();
				}

				// menu options processing
				switch (option) {				
				case 1:
					System.out.println("All players");
					showAllPlayers();
					System.out.println();
					break;
				case 2:
					System.out.println("All players from Ireland");					
					showAllPlayersByName(getAllPlayersByCountry(Country.IRE));
					System.out.println();
					break;
				case 3:					
					showPlayerByScore(playerWithHighestPoints());
					break;
				case 4:					
					Collections.sort(players, new CompareByHeight());					
					showAllPlayersByNameAndHeight();
					break;
				case 5:
					displayClubCaps(clubsInternationalCaps());
					break;
				case 6:
					capitalisePlayersName();
					outputToFile();
					break;
				case 7:
					System.out.println("Quitting");
					break; // rem. need the break here too !
				default:
					System.out.println("Try options again...");
				}
			} while (option != 7);
			// scanner will close automatically - try - catch with resource management
		} catch (Exception exception) {
			// general exception - not able to recover therefore ending gracefully - passing
			// back to main method to deal with
			throw exception;
		}
	}

	/**
	 * Reads in the data from the csv and maps to the Player class
	 */
	public static void readData() throws Exception {

		File file = new File(FILE_IN);

		FileReader fileReader;
		BufferedReader bufferedReader;
		String playerInfo;
		String[] stats;

		try {
			fileReader = new FileReader(file);
			bufferedReader = new BufferedReader(fileReader);
			// parse each data point - by comma

			playerInfo = bufferedReader.readLine();
			// ignore the first line (header values)
			playerInfo = bufferedReader.readLine();

			do {
				// create a player and add the stats
				Player player = new Player();
				stats = playerInfo.split(",");				
				
				// note could also be in separate method
				switch (Integer.parseInt(stats[0])) {
				case 1:
					player.setCountry(Country.ENG);
					break;
				case 2:
					player.setCountry(Country.FRA);
					break;
				case 3:
					player.setCountry(Country.IRE);
					break;
				case 4:
					player.setCountry(Country.ITA);
					break;
				case 5:
					player.setCountry(Country.SCO);
					break;
				case 6:
					player.setCountry(Country.WAL);
					break;
				default:
					// bad data - option to 1. ignore 2. throw exception 3. log and move on
				}

				// need to split this field before setting as first and last name (based on
				// space " ")
				String[] fullName = stats[1].split(" ");
				player.setFirstName(fullName[0]);
				player.setLastName(fullName[1]);

				// get players position - using enum here
				if (stats[2].equalsIgnoreCase("Back")) {
					player.setPosition(Position.Back);
				} else {
					player.setPosition(Position.Forward);
				}
				
				// need to parse value
				player.setTotalGamesPlayed(Integer.parseInt(stats[3]));
				player.setPoints(Integer.parseInt(stats[4]));
				player.setWin(Integer.parseInt(stats[5]));

				// ignore parts of the csv if needed.
				player.setHeight(Double.parseDouble(stats[8]));
				player.setClub(stats[9]);
				player.setInfluence(Integer.parseInt(stats[10]));

				// calculate and store percentage wins - note need to cast here for accurate
				// recording - could also be calculated each time on the getPercenatge win
				// within the Player class...

				player.setPercentageWins((double) player.getWin() / player.getTotalGamesPlayed() * 100);

				// add to collection of players
				players.add(player);

				// read the next line
				playerInfo = bufferedReader.readLine();

			} while (playerInfo != null);

			// close all
			fileReader.close();
			bufferedReader.close();

		} catch (FileNotFoundException e) {
			throw new Exception("Unable to find the file " + FILE_IN);
		} catch (IOException e) {
			throw new Exception("Other issues with file read  ");
			// could log these or use own defined exception type
		} catch (Exception e) {
			throw new Exception("General issue on data read / processing  ");
		}
	}

	/**
	 * Utility method that displays all players as per specification formatting
	 * @throws Exception 
	 */
	public static void showAllPlayers() throws Exception {
		// checking for potential null or no players 
		if (players == null || players.size()==0) {
			throw new Exception("No data");
		}
		for (Player player : players) {
			player.displayAll();
		}
	}

	/**
	 * Utility method that displays all players by name per specification formatting
	 * 
	 * @param players
	 */
	public static void showAllPlayersByName(List<Player> playersList) {
		for (Player player : playersList) {
			player.displayName();
		}
	}

	/**
	 * Utility method that displays all players by name & height per specification
	 * formatting
	 * 
	 * @param players
	 */
	public static void showAllPlayersByNameAndHeight() {
		for (Player player : players) {
			player.displayNameHeight();
		}
	}

	
	/**
	 * Gets player with highest score - there could be more than one so returning a list rather than one object
	 * 
	 * @return
	 */
	public static List<Player> playerWithHighestPoints() {
		List<Player> highestScorers = new ArrayList<Player>(); // could be more than one

		int highest = -1; // reasonable default outside range value
		int playerScore = 0;

		for (Player player : players) {
			playerScore = player.getPoints();
			if (playerScore > highest) {
				// new highest total
				highest = playerScore;
				highestScorers.clear();
				highestScorers.add(player);
			} else if (playerScore == highest) {
				highestScorers.add(player);
			} else {
				// do nothing
			}
		}
		return highestScorers;
		
		
	}

	/**
	 * shows all players with highest points scored - there could be more than one
	 * 
	 * @param playerWithHighestPoints
	 */
	public static void showPlayerByScore(List<Player> playerWithHighestPoints) {
		System.out.println("Highest point scorer");
		for (Player player : playerWithHighestPoints) {
			player.displayNameScore();
		}
		System.out.println();

	}

	/**
	 * Gets all players by specified country
	 * 
	 * @param country
	 * @return
	 */
	public static List<Player> getAllPlayersByCountry(Country country) {
		List<Player> playersByCountry = new ArrayList<Player>();
		for (Player player : players) {
			if (player.getCountry().equals(country)) {
				
				playersByCountry.add(player);
			}
		}
		return playersByCountry;
	}

	/**
	 * gets clubs (sorted) by their players' 6 nation's games played
	 * 
	 * @return
	 */
	public static SortedMap<String, Integer> clubsInternationalCaps() {

		// map - key is the club name and caps total
		SortedMap<String, Integer> clubCaps = new TreeMap<String, Integer>();

		for (Player player : players) {
			if (clubCaps.containsKey(player.getClub())) {
				// update the club caps
				int totalCaps = clubCaps.get(player.getClub());

				clubCaps.put(player.getClub(), totalCaps + player.getTotalGamesPlayed());
			} else {
				// new club
				clubCaps.put(player.getClub(), player.getTotalGamesPlayed());
			}
		}
		return clubCaps;
	}

	/**
	 * Displays the clubs and 6 nations caps
	 * 
	 * @param clubCaps
	 */
	public static void displayClubCaps(SortedMap<String, Integer> clubCaps) {
		for (String club : clubCaps.keySet()) {
			System.out.println(club + " : " + clubCaps.get(club));
		}
	}

	
	/**
	 * Capitalise the players last name
	 */
	public static void capitalisePlayersName() {

		for (Player player : players) {
			player.setLastName(player.getLastName().toUpperCase());
		}
	}

	/**
	 * Starts thread to output to file also has a interrupt check 
	 */
	public static void outputToFile() {
		WriteToFile wf = new WriteToFile();
		Thread thread = new Thread(wf);
		thread.start();
	}

}

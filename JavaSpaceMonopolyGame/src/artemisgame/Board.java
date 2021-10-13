/**
 * 
 */
package artemisgame;

import java.util.ArrayList;
import java.util.List;

/**
 * Gameboard class to contain the squares 
 *
 */
public class Board {
	
	public static int BOARD_SIZE;
	public static List<Square> gameBoard = new ArrayList<>();
			
	/**
	 * Creates a new game board
	 */
	public static void createBoard() {

		gameBoard.add(new Square("Start", 0));

		gameBoard.add(new ElementSquare("Power and Propulsion Element", 1, Systems.SYSTEM3, 375, 250, 150));
		gameBoard.add(new ElementSquare("Habitation and Logistics Outpost", 2, Systems.SYSTEM3, 400, 300, 150));
		
		gameBoard.add(new ElementSquare("Launch Pad", 3, Systems.SYSTEM1, 280, 150, 100));
		gameBoard.add(new ElementSquare("Crawler Transporter", 4, Systems.SYSTEM1, 300, 200, 100));
		gameBoard.add(new ElementSquare("Vehicle Assembly Building", 5, Systems.SYSTEM1, 325, 250, 100));

		gameBoard.add(new Square("Day-Off", 6, true)); //use overloaded constructor to set as an 'day-off' space.
		
		gameBoard.add(new ElementSquare("Lunar Landers", 7, Systems.SYSTEM4, 100, 50, 50));
		gameBoard.add(new ElementSquare("Artemis Generation Spacesuit", 8, Systems.SYSTEM4, 150, 100, 50));
	
		gameBoard.add(new ElementSquare("RS-25 Engines", 9, Systems.SYSTEM2, 200, 100, 75));
		gameBoard.add(new ElementSquare("Five-Segment Rocket Boosters", 10, Systems.SYSTEM2, 220, 120, 75));
		gameBoard.add(new ElementSquare("Interim Cryogenic Propulsion Stage", 11, Systems.SYSTEM2, 250, 180, 75));
		
		System.out.println("Board Created");
		
		BOARD_SIZE = gameBoard.size();
	}
	
	/**
	 * Method when called will display board information
	 */
	public static void displayBoard() {
		System.out.printf("\n%-15s %-35s %-35s %-15s %-10s %-10s\n", "SQUARE", "NAME", "SYSTEM", "OWNER", "COST", "RENT"); //'table' header
		for (Square square : gameBoard) {
			square.displaySquareInfo();	
			if (!(square instanceof ElementSquare)) { //instance of Square class only, must add n/a to empty columns
				System.out.printf(" %-35s %-15s %-10s %-10s\n", "n/a", "n/a", "n/a", "n/a");
			}
		}
		System.out.println();
	}

}

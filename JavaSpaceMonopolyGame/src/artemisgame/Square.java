/**
 * 
 */
package artemisgame;

/**
 * Basic square on a Board
 * @author Andrew
 *
 */
public class Square {

	private String name;
	private int boardIndex;
	private boolean dayOff;
	
	/**
	 * Constructor with args. Note, day-off is set to false by default using this constructor.
	 * 
	 * @param name
	 * @param boardIndex
	 */
	public Square(String name, int boardIndex) {
		this.name = name;
		this.boardIndex = boardIndex;
		this.dayOff = false;
	}
	
	/**
	 * Constructor with args, including day-off. Use this constructor to set day-off to true!
	 * 
	 * @param name
	 * @param boardIndex
	 */
	public Square(String name, int boardIndex, boolean dayOff) {
		this.name = name;
		this.boardIndex = boardIndex;
		this.dayOff = dayOff;
	}

	/**
	 * @return the name
	 */
	public String getName() {
		return name;
	}

	/**
	 * @return the boardIndex
	 */
	public int getBoardIndex() {
		return boardIndex;
	}
	
	/**
	 * @return dayOff
	 */
	public boolean isDayOff() {
		return dayOff;
	}

	/**
	 * Displays boardIndex and name
	 */
	public void displaySquareInfo() {

		System.out.printf("%-15d %-35s", this.boardIndex, this.name);
	}
		

}

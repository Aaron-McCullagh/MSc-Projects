/**
 * 
 */
package artemisgame;

/**
 * @author Andrew
 *
 */
public class ElementSquare extends Square {

	private static final int MAX_NUMBER_OF_DEVELOPMENTS = 4;
	private static final double RENT_INCREASE_RATE = 1.5;

	private Systems system;
	private int cost;
	private int rent;
	private boolean owned;
	private Player owner;
	private int numberOfDevelopments;
	private int costOfDevelopment;
	private boolean isFullyDeveloped;

	/**
	 * Constructor with args
	 * 
	 * @param name
	 * @param boardIndex
	 * @param system
	 * @param cost
	 * @param rent
	 * @param costOfDevelopment
	 */
	public ElementSquare(String name, int boardIndex, Systems system, int cost, int rent, int costOfDevelopment) {
		super(name, boardIndex);
		this.system = system;
		this.cost = cost;
		this.rent = rent;
		this.owned = false;
		this.owner = null;
		this.numberOfDevelopments = 0;
		this.costOfDevelopment = costOfDevelopment;
		this.isFullyDeveloped = false;
	}

	/**
	 * @return the system
	 */
	public Systems getSystem() {
		return system;
	}

	/**
	 * @param system the system to set
	 */
	public void setSystem(Systems system) {
		this.system = system;
	}

	/**
	 * @return the cost
	 */
	public int getCost() {
		return cost;
	}

	/**
	 * @param cost the cost to set
	 */
	public void setCost(int cost) {
		this.cost = cost;
	}

	/**
	 * @return the rent
	 */
	public int getRent() {
		return rent;
	}

	/**
	 * @param rent the rent to set
	 */
	public void setRent(int rent) {
		this.rent = rent;
	}

	/**
	 * Calculate Rent based on number of Developments
	 */
	public int calculateRent() {
		int calculatedRent;
		if (numberOfDevelopments == 0) {
			calculatedRent = rent;
		} else {
			calculatedRent = (int) (rent * numberOfDevelopments * RENT_INCREASE_RATE);
		}
		return calculatedRent;
	}

	/**
	 * @return the owned
	 */
	public boolean isOwned() {
		return owned;
	}

	/**
	 * @return the owner
	 */
	public Player getOwner() {
		return owner;
	}

	/**
	 * Sets the player that owns this ElementSquare, and Owned to true
	 * 
	 * @param owner the owner to set
	 */
	public void setOwnerAndIsOwned(Player owner) {
		this.owner = owner;
		this.owned = true;
	}

	/**
	 * @return the numberOfDevelopments
	 */
	public int getNumberOfDevelopments() {
		return numberOfDevelopments;
	}

	/**
	 * @param numberOfDevelopments the numberOfDevelopments to set
	 */
	public void setNumberOfDevelopments(int numberOfDevelopments) {
		this.numberOfDevelopments = numberOfDevelopments;
	}

	/**
	 * Increment the number of development till fully developed
	 */
	public void incrementNumberOfDevelopments() {
		if (numberOfDevelopments < MAX_NUMBER_OF_DEVELOPMENTS) {
			this.numberOfDevelopments++;
			if (numberOfDevelopments == MAX_NUMBER_OF_DEVELOPMENTS) {
				System.out.println("You have complete a Major Development");
				this.isFullyDeveloped = true;
			} else {
				System.out.println("You have made a development");
			}
		}
	}

	/**
	 * @return the costOfDevelopment
	 */
	public int getCostOfDevelopment() {
		return costOfDevelopment;
	}

	/**
	 * @param costOfDevelopment the costOfDevelopment to set
	 */
	public void setCostOfDevelopment(int costOfDevelopment) {
		this.costOfDevelopment = costOfDevelopment;
	}

	/**
	 * @return the isFullyDeveloped
	 */
	public boolean isFullyDeveloped() {
		return isFullyDeveloped;
	}

	/**
	 * @param isFullyDeveloped the isFullyDeveloped to set
	 */
	public void setFullyDeveloped(boolean isFullyDeveloped) {
		this.isFullyDeveloped = isFullyDeveloped;
	}

	/**
	 * Display the system name
	 * 
	 * @return
	 */
	public String displaySystem() {
		String systemName = "Empty";

		try { // try catch as may throw a null input exception

			switch (getSystem()) {
			case SYSTEM1:
				systemName = "Exploration Ground System (EGS)";
				break;
			case SYSTEM2:
				systemName = "Space Launch System (SLS)";
				break;
			case SYSTEM3:
				systemName = "Gateway System";
				break;
			case SYSTEM4:
				systemName = "Human Landing System";
				break;
			default:
				systemName = "Error - Invalid System";
			}

		} catch (NullPointerException nullPointerException) {
			systemName = "Error - Invalid System";
		}

		return systemName;
	}

	/**
	 * Displays Square Info, overrides method in square to show extra information
	 */
	@Override
	public void displaySquareInfo() {

		String ownerName;
		if (!isOwned()) {
			ownerName = "Unowned";
		} else {
			ownerName = getOwner().getName();
		}

		System.out.printf("%-15d %-35s %-35s %-15s %-10s %-10s\n", getBoardIndex(), getName(), displaySystem(),
				ownerName, ("$" + getCost() + "m"), ("$" + calculateRent() + "m"));

	}

	/**
	 * Display All info required to develop an element
	 */
	public void displayOwnedElementInfo() {
		if (!isFullyDeveloped()) {
			System.out.printf("%-15d %-35s %-35s %-15s %-10s\n", getBoardIndex(), getName(), displaySystem(),
					(numberOfDevelopments + "/" + MAX_NUMBER_OF_DEVELOPMENTS), ("$" + costOfDevelopment + "m"));

		} else { // Will show if fully developed
			System.out.printf("%-15d %-35s %-35s %-15s %-10s\n", getBoardIndex(), getName(), displaySystem(),
					"Complete!", "n/a");
		}
	}

	/**
	 * Display Element info for end game
	 */
	public void displayElementEndGameInfo() {
		if (!isFullyDeveloped()) {
			System.out.printf("%-15d %-35s %-35s %-15s\n", getBoardIndex(), getName(), displaySystem(),
					(numberOfDevelopments + "/" + MAX_NUMBER_OF_DEVELOPMENTS));
		} else {
			System.out.printf("%-15d %-35s %-35s %-15s\n", getBoardIndex(), getName(), displaySystem(),
					("Completed!"));
		}
	}

}

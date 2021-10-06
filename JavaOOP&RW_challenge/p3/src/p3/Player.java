package p3;

/**
 * Represents a player in the system
 * @author Aaron
 *
 */
public class Player {

	private Country country;
	private String firstName;
	private String lastName;
	private Position position;
	private String club;
	private int totalGamesPlayed;
	private int influence;
	private int points;
	private int win;
	private double height;
	private double percentageWins;
	
	/**
	 * Default constructor
	 */
	public Player() {
		
	}


	/**
	 * Player with args creation
	 * @param country
	 * @param firstName
	 * @param lastName
	 * @param position
	 * @param club
	 * @param totalGamesPlayed
	 * @param influence
	 * @param points
	 * @param win
	 * @param height
	 * @param percentageWins
	 */
	public Player(Country country, String firstName, String lastName, Position position, String club,
			int totalGamesPlayed, int influence, int points, int win, double height,
			double percentageWins) {
		
		// note lack of business rule so setting directly - no need to enage with set (extra method call)
		this.country = country;
		this.firstName = firstName;
		this.lastName = lastName;
		this.position = position;
		this.club = club;
		this.totalGamesPlayed = totalGamesPlayed;
		this.influence = influence;
		this.points = points;
		this.win = win;
		this.height = height;
		this.percentageWins = percentageWins;
	}


	/**
	 * @return the country
	 */
	public Country getCountry() {
		return country;
	}


	/**
	 * @param country the country to set
	 */
	public void setCountry(Country country) {
		this.country = country;
	}


	/**
	 * @return the firstName
	 */
	public String getFirstName() {
		return firstName;
	}


	/**
	 * @param firstName the firstName to set
	 */
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}


	/**
	 * @return the lastName
	 */
	public String getLastName() {
		return lastName;
	}


	/**
	 * @param lastName the lastName to set
	 */
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}


	/**
	 * @return the position
	 */
	public Position getPosition() {
		return position;
	}


	/**
	 * @param position the position to set
	 */
	public void setPosition(Position position) {
		this.position = position;
	}


	/**
	 * @return the club
	 */
	public String getClub() {
		return club;
	}


	/**
	 * @param club the club to set
	 */
	public void setClub(String club) {
		this.club = club;
	}


	/**
	 * @return the totalGamesPlayed
	 */
	public int getTotalGamesPlayed() {
		return totalGamesPlayed;
	}


	/**
	 * @param totalGamesPlayed the totalGamesPlayed to set
	 */
	public void setTotalGamesPlayed(int totalGamesPlayed) {
		this.totalGamesPlayed = totalGamesPlayed;
	}


	/**
	 * @return the influence
	 */
	public int getInfluence() {
		return influence;
	}


	/**
	 * @param influence the influence to set
	 */
	public void setInfluence(int influence) {
		this.influence = influence;
	}


	/**
	 * @return the points
	 */
	public int getPoints() {
		return points;
	}


	/**
	 * @param points the points to set
	 */
	public void setPoints(int points) {
		this.points = points;
	}


	/**
	 * @return the win
	 */
	public int getWin() {
		return win;
	}


	/**
	 * @param win the win to set
	 */
	public void setWin(int win) {
		this.win = win;
	}


	
	/**
	 * @return the height
	 */
	public double getHeight() {
		return height;
	}


	/**
	 * @param height the height to set
	 */
	public void setHeight(double weight) {
		this.height = weight;
	}


	/**
	 * @return the percentageWins
	 */
	public double getPercentageWins() {
		return percentageWins;
	}


	/**
	 * @param percentageWins the percentageWins to set
	 */
	public void setPercentageWins(double percentageWins) {
		this.percentageWins = percentageWins;
	}
	
	/**
	 * Util to display all
	 */
	public void displayAll() {
		System.out.println();
		System.out.println("Country      \t:"+this.country);
		System.out.println("First name   \t:"+this.firstName);
		System.out.println("Last name    \t:"+this.lastName);
		System.out.println("Position     \t:"+this.position);
		System.out.println("Club         \t:"+this.club);
		System.out.println("Total games  \t:"+this.totalGamesPlayed);
		System.out.println("Wins         \t:"+this.win);
		System.out.printf("Height        \t:%.2f\n",this.height);
		System.out.println("Points         \t:"+this.points);
		System.out.println("Influence    \t:"+this.influence);
		System.out.println("Percent wins \t:"+this.percentageWins);
		System.out.println();
	}


	/**
	 * Util to display name
	 */
	public void displayName() {
		System.out.println(this.firstName + " "+this.lastName);
	}
	
	/**
	 * Util to display name & height
	 */
	public void displayNameHeight() {
		System.out.println(this.height + "\t "+this.firstName +" "+this.lastName);
	}

	/**
	 * Util to display name and score
	 */
	public void displayNameScore() {
		System.out.println(this.firstName +" "+this.lastName +" " +this.getCountry() +" " +this.getPoints());
	}
	
	
}

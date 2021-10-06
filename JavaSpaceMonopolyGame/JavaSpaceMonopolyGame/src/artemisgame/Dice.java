/**
 * 
 */
package artemisgame;

import java.util.Random;

/**
 * @author Andrew
 *
 */
public class Dice {
	
	public static final int DIE_MAX = 6; // Change max number on die
	
	private int faceValue;	
	
	/**
	 * Generates a random number for dice roll 
	 * @return faceValue 
	 */
	public int rollDice() {
		Random rand = new Random();
		faceValue = rand.nextInt(DIE_MAX) + 1;
		return faceValue;
	}

}

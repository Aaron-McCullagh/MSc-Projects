/**
 * 
 */
package artemisgame;

import java.util.Random;


public class Dice {
	
	public static final int DICE_MAX = 6; // Change max number on dice
	
	private int faceValue;	
	
	/**
	 * Generates a random number for dice roll 
	 * @return faceValue 
	 */
	public int rollDice() {
		Random rand = new Random();
		faceValue = rand.nextInt(DICE_MAX) + 1;
		return faceValue;
	}

}

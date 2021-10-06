/**
 * 
 */
package artemisgame;

import java.util.Comparator;

/**
 * @author Andrew
 *
 */
public class CompareResources implements Comparator<Player> {

	@Override
	public int compare(Player p1, Player p2) {
		return p2.getResource() - p1.getResource();
	}

}

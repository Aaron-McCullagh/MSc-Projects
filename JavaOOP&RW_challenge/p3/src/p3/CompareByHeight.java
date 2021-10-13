package p3;

import java.util.Comparator;

/**
 * Compares by height ; note use of complex seelction due to double (datatype) for height
 * 
 */
public class CompareByHeight implements Comparator<Player>{

	@Override
	public int compare(Player p1, Player p2) {
		
		if (p2.getHeight() > p1.getHeight()) {
			return 1;
		} else if (p2.getHeight() < p1.getHeight()){
			return -1;
		} else {
			return 0;
		}
	}
}

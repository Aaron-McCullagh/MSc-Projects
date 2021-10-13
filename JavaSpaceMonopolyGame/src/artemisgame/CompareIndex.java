/**
 * 
 */
package artemisgame;

import java.util.Comparator;


public class CompareIndex implements Comparator<ElementSquare> {

	@Override
	public int compare(ElementSquare s1, ElementSquare s2) {
		return s1.getBoardIndex() - s2.getBoardIndex();
	}
}

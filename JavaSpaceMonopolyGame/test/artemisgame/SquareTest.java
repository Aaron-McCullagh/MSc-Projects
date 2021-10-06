package artemisgame;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

class SquareTest {

	//test data
	int boardIndexValid;
	String nameValid;
	
	Square square;
	
	@BeforeEach
	void setUp() throws Exception {
		
		boardIndexValid = 1;
		nameValid = "ValidName";
		
	}

	/**
	 * Test method for Square constructor and getters.
	 */
	@Test
	void testSquareConstructorAndGetters() {
		square = new Square(nameValid, boardIndexValid);
		
		assertEquals(nameValid, square.getName());
		assertEquals(boardIndexValid, square.getBoardIndex());
	}

}

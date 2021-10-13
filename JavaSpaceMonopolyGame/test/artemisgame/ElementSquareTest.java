/**
 * 
 */
package artemisgame;

import static org.junit.jupiter.api.Assertions.*;

import java.io.ByteArrayOutputStream;
import java.io.PrintStream;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;


class ElementSquareTest {

	// test data

	Systems system1, system2, system3, system4;
	String nameValid;
	int boardIndexValid, costValid, rentValid, yearOwnedValid, numberOfDevelopmentsValid, costOfDevelopmentValid,
			yearFullyDevelopedValid;
	int yearOwnedDefault, numberOfDevelopmentsDefault, yearFullyDevelopedDefault;
	ElementSquare elementSquare, elementSquareGeneric;
	boolean ownedDefault, isFullyDevelopedDefault, ownedTrue, fullyDevelopedTrue;
	Player ownerDefault, player;

	double rentIncreaseRate;
	
	//For testing console output
	ByteArrayOutputStream outContent = new ByteArrayOutputStream();
	PrintStream originalOut = System.out;
	
	/**
	 * @throws java.lang.Exception
	 */
	@BeforeEach
	void setUp() throws Exception {

		// Valid constructor/setter values for instance vars
		system1 = Systems.SYSTEM1;
		system2 = Systems.SYSTEM2;
		system3 = Systems.SYSTEM3;
		system4 = Systems.SYSTEM4;
		costValid = 100;
		rentValid = 10;
		yearOwnedValid = 2020;
		numberOfDevelopmentsValid = 1;
		costOfDevelopmentValid = 20;
		yearFullyDevelopedValid = 2025;
		
		ownedTrue = true;
		fullyDevelopedTrue = true;

		// Expected default values for instance vars that can't assigned using
		// constructor
		ownedDefault = false;
		ownerDefault = null;
		yearOwnedDefault = -1;
		numberOfDevelopmentsDefault = 0;
		isFullyDevelopedDefault = false;
		yearFullyDevelopedDefault = -1;
		

		// 'Empty' generic ElementSquare for testing setters (no default constructor)
		elementSquareGeneric = new ElementSquare(null, 0, null, 0, 0, 0);

		//Other test data values
		rentIncreaseRate = 1.5;
		
		

	}
	
	//Clears stream after each test
	@AfterEach
	void restoreStream() {
		System.setOut(originalOut);
	}
	

	/**
	 * Test method for ElementSquare constructor. Note not all instance vars are
	 * settable via the constructor by design.
	 */
	@Test
	void testElementSquare() {

		elementSquare = new ElementSquare(nameValid, boardIndexValid, system1, costValid, rentValid,
				costOfDevelopmentValid);

		// testing the instance vars set by constructor
		assertEquals(nameValid, elementSquare.getName());
		assertEquals(boardIndexValid, elementSquare.getBoardIndex());
		assertEquals(system1, elementSquare.getSystem());
		assertEquals(costValid, elementSquare.getCost());
		assertEquals(rentValid, elementSquare.getRent());
		assertEquals(costOfDevelopmentValid, elementSquare.getCostOfDevelopment());

		// testing instance vars that are initially assigned the same value every
		// ElementSquare
		assertEquals(ownedDefault, elementSquare.isOwned());
		assertEquals(ownerDefault, elementSquare.getOwner());
		assertEquals(numberOfDevelopmentsDefault, elementSquare.getNumberOfDevelopments());
		assertEquals(isFullyDevelopedDefault, elementSquare.isFullyDeveloped());

	}

	/**
	 * Test method for Systems setter and getter.
	 */
	@Test
	void testSetGetSystem() {

		elementSquareGeneric.setSystem(system1);
		assertEquals(system1, elementSquareGeneric.getSystem());

	}

	/**
	 * Test method for cost setter and getter.
	 */
	@Test
	void testSetGetCost() {

		elementSquareGeneric.setCost(costValid);
		assertEquals(costValid, elementSquareGeneric.getCost());
	}

	/**
	 * Test method for rent setter and getter.
	 */
	@Test
	void testSetGetRent() {

		elementSquareGeneric.setRent(rentValid);
		assertEquals(rentValid, elementSquareGeneric.getRent());
	}

	/**
	 * Test method for calculate rent with no developments
	 */
	@Test
	void testCalculateRentNoDevelopments() {

		elementSquareGeneric.setRent(rentValid);
		assertEquals(rentValid, elementSquareGeneric.calculateRent());

	}

	/**
	 * Test method for calculate rent with 1 developments
	 */
	@Test
	void testCalculateRentOneDevelopments() {
		
		

		elementSquareGeneric.setRent(rentValid);
		elementSquareGeneric.incrementNumberOfDevelopments();

		assertEquals(rentValid * rentIncreaseRate * elementSquareGeneric.getNumberOfDevelopments(),
				elementSquareGeneric.calculateRent());

		System.out.println(elementSquareGeneric.calculateRent());
		
		
		
	}
	
	/**
	 * Test method for calculate rent with 2 developments
	 */
	@Test
	void testCalculateRentTwoDevelopments() {

		elementSquareGeneric.setRent(rentValid);
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();

		assertEquals(rentValid * rentIncreaseRate * elementSquareGeneric.getNumberOfDevelopments(),
				elementSquareGeneric.calculateRent());

		System.out.println(elementSquareGeneric.calculateRent());
	}

	/**
	 * Test method for calculate rent with 3 developments
	 */
	@Test
	void testCalculateRentThreeDevelopments() {

		elementSquareGeneric.setRent(rentValid);
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		assertEquals(rentValid * rentIncreaseRate * elementSquareGeneric.getNumberOfDevelopments(),
				elementSquareGeneric.calculateRent());

		System.out.println(elementSquareGeneric.calculateRent());
	}
	
	/**
	 * Test method for calculate rent with 4 developments
	 */
	@Test
	void testCalculateRentFourDevelopments() {

		elementSquareGeneric.setRent(rentValid);
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		assertEquals(rentValid * rentIncreaseRate * elementSquareGeneric.getNumberOfDevelopments(),
				elementSquareGeneric.calculateRent());

		System.out.println(elementSquareGeneric.calculateRent());
	}
	
	

	/**
	 * Test method for owner setter and getter.
	 */
	@Test
	void testSetGetOwner() {

		Board.createBoard(); //Board must be generated for player to instantiate using constructor - see Player class.
		player = new Player("TestPlayer"); 
		
		elementSquareGeneric.setOwnerAndIsOwned(player);
		assertEquals(player, elementSquareGeneric.getOwner());
		assertEquals(ownedTrue, elementSquareGeneric.isOwned());
	}

	/**
	 * Test method for numberOfDevelopments setter and getter. NOTE this method does not currently have any 
	 * validation attached to it - it's possible to get over the MAX_NUMBER_OF_DEVELOPMENTS using this setter
	 * Preferred method is increment
	 */
	@Test
	void testSetNumberOfDevelopments() {
		
		elementSquareGeneric.setNumberOfDevelopments(numberOfDevelopmentsValid);
		assertEquals(numberOfDevelopmentsValid, elementSquareGeneric.getNumberOfDevelopments());
	}

	/**
	 * Test method for incrementNumberOfDevelopments by one
	 */
	@Test
	void testIncrementNumberOfDevelopmentsValidByOne() {
		
		//For testing prints to console - next line captured
		System.setOut(new PrintStream(outContent)); 
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		
		
		assertEquals(1, elementSquareGeneric.getNumberOfDevelopments());
		
		assertTrue(!elementSquareGeneric.isFullyDeveloped()); //check fully developed remains FALSE
		
		assertEquals("You have made a development", outContent.toString().trim()); //Check output is expected
		
		
	}
	
	/**
	 * Test method for incrementNumberOfDevelopments by two
	 */
	@Test
	void testIncrementNumberOfDevelopmentsValidByTwo() {
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		assertEquals(2, elementSquareGeneric.getNumberOfDevelopments());
		
		assertTrue(!elementSquareGeneric.isFullyDeveloped()); //check fully developed remains FALSE
	
	}
	
	/**
	 * Test method for incrementNumberOfDevelopments by three
	 */
	@Test
	void testIncrementNumberOfDevelopmentsValidByThree() {
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		assertEquals(3, elementSquareGeneric.getNumberOfDevelopments());
		
		assertTrue(!elementSquareGeneric.isFullyDeveloped()); //check fully developed remains FALSE
		
		
	}
	
	/**
	 * Test method for incrementNumberOfDevelopments by four - i.e. becomes fully developed
	 */
	@Test
	void testIncrementNumberOfDevelopmentsValidByFour() {
		
		System.setOut(originalOut); //clear output so only last line to screen tested
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		//For testing prints to console - next line captured (for major dev)
		System.setOut(new PrintStream(outContent));
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		assertEquals(4, elementSquareGeneric.getNumberOfDevelopments());
		
		assertTrue(elementSquareGeneric.isFullyDeveloped()); //check fully developed remains TRUE
		
		assertEquals("You have complete a Major Development", outContent.toString().trim());
		
	}
	
	/**
	 * Test method for incrementNumberOfDevelopments beyond MAX_NUMBER_OF_DEVELOPMENTS
	 * Note, doing so code simply does not update to 5 - remains at four devs. 
	 * In practice, main game code prevent this situation arising by checking
	 * whether element isFullyDeveloped - if true, does not allow player
	 * to make another devleopment.
	 */
	@Test
	void testIncrementNumberOfDevelopmentsInvalidOverMax() {
		
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		elementSquareGeneric.incrementNumberOfDevelopments();
		
		assertEquals(4, elementSquareGeneric.getNumberOfDevelopments());
		
	}

	/**
	 * Test method for costOfDevelopment setter and getter..
	 */
	@Test
	void testSetGetCostOfDevelopment() {
		elementSquareGeneric.setCostOfDevelopment(costOfDevelopmentValid);
		assertEquals(costOfDevelopmentValid, elementSquareGeneric.getCostOfDevelopment());
	}

	/**
	 * Test method for fullyDeveloped setter and getter.
	 */
	@Test
	void testSetGetFullyDeveloped() {
		
		elementSquareGeneric.setFullyDeveloped(fullyDevelopedTrue);
		assertEquals(fullyDevelopedTrue, elementSquareGeneric.isFullyDeveloped());
		
	}



	/**
	 * Test method for displaySystem, SYSTEM1.
	 */
	@Test
	void testDisplaySystemValidSystem1() {
		
		elementSquareGeneric.setSystem(system1);
		assertEquals("Exploration Ground System (EGS)", elementSquareGeneric.displaySystem());
		
	}
	
	/**
	 * Test method for displaySystem, SYSTEM2.
	 */
	@Test
	void testDisplaySystemValidSystem2() {
		
		elementSquareGeneric.setSystem(system2);
		assertEquals("Space Launch System (SLS)", elementSquareGeneric.displaySystem());
		
	}
	
	/**
	 * Test method for displaySystem, SYSTEM3.
	 */
	@Test
	void testDisplaySystemValidSystem3() {
		
		elementSquareGeneric.setSystem(system3);
		assertEquals("Gateway System", elementSquareGeneric.displaySystem());
		
	}
	
	/**
	 * Test method for displaySystem, SYSTEM4.
	 */
	@Test
	void testDisplaySystemValidSystem4() {
		
		elementSquareGeneric.setSystem(system4);
		assertEquals("Human Landing System", elementSquareGeneric.displaySystem());
		
	}
	
	/**
	 * Test method for invalid system - i.e null. NB This test fails at present.
	 */
	@Test
	void testDisplaySystemInvalid() {
		
		//For testing prints to console - next line captured
				System.setOut(new PrintStream(outContent)); 
		
		elementSquareGeneric.setSystem(null);
		assertEquals("Error - Invalid System", elementSquareGeneric.displaySystem());
		
	}

	

	
}

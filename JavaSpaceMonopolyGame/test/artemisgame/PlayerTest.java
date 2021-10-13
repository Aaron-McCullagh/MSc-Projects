package artemisgame;

import static org.junit.jupiter.api.Assertions.*;


import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;


class PlayerTest {

	// test data
	String name, nameP1, nameP2;
	Player player, player1, player2, playerGeneric;
	
	//Default vars
	int resourceExpectedInital, resourceSupply, resourceExpectedIncrease, resourceExpectedDecrease;
	
	Square squareToMovePlayerTo;
	ElementSquare elementSquare1, elementSquare2;

	@BeforeEach
	void setUp() throws Exception {

		Board.createBoard(); //board must be generated for player position to be set
		
		name = "Player";
		nameP1 = "Player 1";
		nameP2 = "Player 2";
		
		player1 = new Player(nameP1);
		player2 = new Player(nameP2);
		
		playerGeneric = new Player(null); //Generic player for testing setters/getters
		
		//for testing increase and decrease resource
		resourceExpectedInital = 800;
		resourceSupply = 200; 
		resourceExpectedIncrease = 1000;
		resourceExpectedDecrease = 600;
		
		squareToMovePlayerTo = Board.gameBoard.get(6); //used to test movePlayer
		
		elementSquare1 = (ElementSquare) Board.gameBoard.get(1);
		elementSquare2 = (ElementSquare) Board.gameBoard.get(2);

	}

	/**
	 * Test for Player constructor with args
	 */
	@Test
	void testPlayerConstructor() {

		player = new Player(name);
		
		assertEquals(name, player.getName());
		assertEquals(resourceExpectedInital, player.getResource());
		assertEquals(Board.gameBoard.get(0), player.getPosition());
		assertTrue(player.getOwnedElements().isEmpty()); 
		
		
	}

	/**
	 * Test method for name setter and getters
	 */
	@Test
	void testSetGetName() {

		playerGeneric.setName(name);
		assertEquals(name, playerGeneric.getName());
		
	}

	/**
	 * Test method for get resource. 
	 */
	@Test
	void testGetResource() {
		
		assertEquals(resourceExpectedInital, playerGeneric.getResource());
	}

	/**
	 * Test method for increaseResource 
	 */
	@Test
	void testIncreaseResource() {
		
		playerGeneric.increaseResource(resourceSupply);
		assertEquals(resourceExpectedIncrease, playerGeneric.getResource());
	}

	/**
	 * Test method for decreaseResource
	 */
	@Test
	void testDecreaseResource() {
		
		playerGeneric.decreaseResource(resourceSupply);
		assertEquals(resourceExpectedDecrease, playerGeneric.getResource());
		
	}

	/**
	 * Test method for Position setter and getters. Note ArtemisMainGame handles logic for
	 * using dice roll to inform player's new position. This is just to test that setter
	 * and getter is operational
	 */
	@Test
	void testSetGetPosition() {
		
		
		playerGeneric.setPosition(squareToMovePlayerTo);
		assertEquals(squareToMovePlayerTo, playerGeneric.getPosition());
		
	}


	/**
	 * Test method for ownedElement adder and getter
	 */
	@Test
	void testAddGetOwnedElement() {
		
		playerGeneric.addOwnedElement(elementSquare1);
		
		assertTrue(playerGeneric.getOwnedElements().contains(elementSquare1));
		
		
		playerGeneric.addOwnedElement(elementSquare2);
		
		assertTrue(playerGeneric.getOwnedElements().contains(elementSquare1));
		assertTrue(playerGeneric.getOwnedElements().contains(elementSquare2));
	}


}

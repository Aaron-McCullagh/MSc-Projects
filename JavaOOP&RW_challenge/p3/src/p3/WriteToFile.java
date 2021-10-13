package p3;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

/**
 * Thread based class that will output data in csv format 
 *
 */
public class WriteToFile implements Runnable {

	
	private final static String FILE_OUT = "playerstats_updatedAIDAN.csv";
	
	@Override
	public void run() {
		
		System.out.println("Writing to file ... ");
		File file = new File(FILE_OUT);

		FileWriter fileWriter;
		BufferedWriter bufferedWriter;
		
		String separator = ",";
		StringBuilder sb = new StringBuilder(); 
		sb.append("Last name,First name,Country");
		
		try {
			fileWriter = new FileWriter(file,false);
			bufferedWriter = new BufferedWriter(fileWriter);
			bufferedWriter.write(sb.toString());
			
			for (Player player : StartApp.players) {
				sb.append("\n");
				sb.append(player.getLastName());  
				sb.append(separator);
				sb.append(player.getFirstName());
				sb.append(separator);
				sb.append(player.getCountry());
				bufferedWriter.write(sb.toString());
				sb.setLength(0); 
				
				// check for interrupt 
				if (Thread.currentThread().isInterrupted()) {
					// need to quit gracefully
					bufferedWriter.close();
					fileWriter.close();
				}
			}
			
			// all writes complete
			bufferedWriter.close();
			fileWriter.close();
			System.out.println("Writing to file complete");
		} catch (IOException e) {	
			System.out.println("Problem writing to file... ");  
		}
		
	}
}

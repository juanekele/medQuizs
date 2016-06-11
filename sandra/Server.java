import java.net.*;
import java.io.*;

public class Server extends Thread {
	public void run() {
		int portNumber = 22;
		try ( 
				ServerSocket serverSocket = new ServerSocket(portNumber);
				Socket clientSocket = serverSocket.accept();
				PrintWriter out =
						new PrintWriter(clientSocket.getOutputStream(), true);
				BufferedReader in = new BufferedReader(
						new InputStreamReader(clientSocket.getInputStream()));
				) {
			System.out.println("Conexión establecida con éxito");
			out.println("Bienvenido. Escriba la contraseña ");
			String contraseña="1234";
			String inputLine;
			while(!(inputLine=in.readLine()).equals(contraseña)){
				out.println("Contraseña incorrecta. Vuelva a intentarlo.");
			}
			out.println("Si quiere publicar un tweet escriba 1. Si quiere recuperar respuestas a tweets pulse 2.");
			inputLine=in.readLine();
			if(inputLine.equals("1")){
				out.println("Escriba el Id del tweet que quiere publicar.");
				inputLine = in.readLine();
				new SendTweet(Integer.parseInt(inputLine));
			}
			else if(inputLine.equals("2")){
				TweetRetriever tweetRetriever=new TweetRetriever();
				tweetRetriever.run();
			}
			else{
				out.println("El número introducido no es correcto");
				while(!((in.readLine()).equals(1))||((in.readLine()).equals(2))){
					out.println("El número introducido no es correcto");
				}
			}
			clientSocket.close();
		} catch (IOException e) {
			System.out.println("Exception caught when trying to listen on port "
					+ portNumber + " or listening for a connection");
			System.out.println(e.getMessage());
		} catch (NumberFormatException e) {
			e.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
}
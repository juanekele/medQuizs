import java.util.Date;
import java.util.Timer;
public class App {
	@SuppressWarnings("deprecation")
	public static void main(String[] args) 
	{
		Timer timer;
		//Objeto fecha para que el tweet diario se publique a las 9:00
		Date daily = new java.util.Date();
		daily.setHours(9); 
		daily.setMinutes(0); 
		//Objeto fecha para que se haga la búsqueda de hashtags a las 23:00
		Date retriever=new java.util.Date();
		retriever.setHours(23);
		retriever.setMinutes(0);
		timer = new Timer( );
		//Programación de las tareas
		timer.schedule ( new TweetRetriever ( ),retriever,1000*60*60*24);
		timer.schedule (new DailyTweet(), daily,1000*60*60*24);
		//Bucle para que el servidor se esté ejecutando continuamente
		while(true){		
			Server server=new Server();		 
			server.start();
			try {
				server.join();
			} catch (InterruptedException e) {
				e.printStackTrace();
			}
		}	
	}
}


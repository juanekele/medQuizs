import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import twitter4j.StatusUpdate;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.conf.ConfigurationBuilder;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.File;
import javax.imageio.ImageIO;

public class SendTweet {
	int id;
	public SendTweet(int id){
		this.id=id;
		java.sql.Connection connection = null; 
		java.sql.Statement statement = null;
		ResultSet resultSet = null; 
		ResultSet resultSet2=null;
		String driverName = "com.mysql.jdbc.Driver"; try {
			Class.forName(driverName);
		} catch (ClassNotFoundException e) {
			System.out.println("No se ha podido cargar el driver");
			e.printStackTrace();
		}
		FileReader FichEntrada;
		try {
			FichEntrada = new FileReader("confBBDD.txt");
			BufferedReader fs2= new BufferedReader(FichEntrada);
			String serverName = fs2.readLine(); 
			String mydatabase = fs2.readLine(); 
			String url = "jdbc:mysql://" + serverName + "/" + mydatabase; 
			String username = fs2.readLine(); 
			String password = fs2.readLine();
			fs2.close();
			connection = DriverManager.getConnection(url, username, password);
			System.out.println("Conexion establecida con BD \n");
		} catch (SQLException e) {
			System.out.println("No se ha podido realizar la conexión a la base de datos");
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		try {
			String pregunta=null;
			String respuestas[]=new String[4];
			statement = connection.createStatement();
			//Se busca la entrada con el identificador que se ha llamado a la clase
			resultSet= statement.executeQuery("SELECT * FROM quiz where id="+id);
			if(resultSet.next()){
				pregunta=resultSet.getString("content");
			}
			//Se buscan las respuestas que corresponden a la pregunta seleccionada
			resultSet2=statement.executeQuery("SELECT * FROM quiz_hashtag where id_quiz="+id);
			for(int i=0;i<respuestas.length;i++){
				if(resultSet2.next()){
					respuestas[i]=resultSet2.getString("value");
				}
			}
			this.PublicarTweet(pregunta,respuestas);
			statement.executeUpdate("UPDATE quiz SET publicado=1 WHERE id="+id);
			resultSet.close();
			statement.close();
			connection.close();
		} catch (SQLException e) {
			System.out.println("No se pudo realizar la consulta");
			e.printStackTrace();
		}
	}
	public Twitter Credenciales(){
		//Este método crea un objeto Tweet con las claves proporcionadas por Twitter para esta aplicación
		ConfigurationBuilder cb = new ConfigurationBuilder();
		FileReader FichEntrada;
		try {
			FichEntrada = new FileReader("conf.txt");
			BufferedReader fs2= new BufferedReader(FichEntrada);
			cb.setDebugEnabled(true)
			.setOAuthConsumerKey(fs2.readLine())
			.setOAuthConsumerSecret(fs2.readLine())
			.setOAuthAccessToken(fs2.readLine())
			.setOAuthAccessTokenSecret(fs2.readLine());
			fs2.close();
		} catch (FileNotFoundException e) {
			System.out.println("No se ha encontrado el fichero");
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		TwitterFactory tf = new TwitterFactory(cb.build());
		Twitter twitter = tf.getInstance();
		return twitter;
	}
	public void PublicarTweet(String mensaje, String[] respuestas){
		Twitter twitter=this.Credenciales();
		this.createImage("black.png", mensaje,respuestas);
		try {
			String nombre="images/Q"+id+".jpg";
			File file = new File(nombre);
			String hashtag="#Q"+id;
			StatusUpdate status = new StatusUpdate(hashtag);
			status.setMedia(file);
			twitter.updateStatus(status);
			System.out.println("El mensaje se ha publicado correctamente");
		} catch (TwitterException e) {
			System.out.println("No se ha podido publicar el mensaje");
			e.printStackTrace();
		}
	}
	public void createImage(String imgstr, String pregunta, String[] respuestas){
		String texto="";
		int saltosDeLinea=0;
		int max=respuestas[0].length();
		int largo=0;
		int ancho=0;
		for (int i = 0; i < respuestas.length; i++) {
			if(respuestas[i].length()>max){
				max=respuestas[i].length();       
			}
		}
		max+=2;
		if((Math.max(max, pregunta.length())<=50)){
			texto=pregunta;
			ancho=50+7*(Math.max(max, pregunta.length()));
			largo=20*10;
		}
		else{
			char[] aCaracteres = pregunta.toCharArray();
			for(int i=0;i<aCaracteres.length;i++){
				texto=texto+aCaracteres[i];
				if(i!=0&&i%50==0&&!Character.isLetter(aCaracteres[i])){
					texto=texto+"\n";
					saltosDeLinea++;
				}
				if(i!=0&&i%50==0&&Character.isLetter(aCaracteres[i])){
					while(Character.isLetter(aCaracteres[i])){
						i++;
						texto=texto+aCaracteres[i];
					}
					texto=texto+"\n";
					saltosDeLinea++;
				}
			}
			ancho=50+7*50;
			largo=20*(saltosDeLinea+1+9);
		}
		BufferedImage image = new BufferedImage(ancho, largo, BufferedImage.TYPE_INT_RGB);
		//Largo=20*numero de lineas
		//Ancho=50+13*numero de caracteres
		String txt=texto+"\n\n"+"a) "+respuestas[0]+"\n"+"b) "+respuestas[1]+"\n"+"c) "+respuestas[2]+"\n"+"d) "+respuestas[3];
		String [] lines = txt.split("\n");
		Graphics2D g = image.createGraphics();
		g.setFont(g.getFont().deriveFont(13f));
		int lineHeight = g.getFontMetrics().getHeight();
		for(int lineCount = 1; lineCount < lines.length + 1; lineCount ++){ //lines from above
			int xPos = 25;
			int yPos = 25 + lineCount * lineHeight;
			String line = lines[lineCount-1];
			g.drawString(line, xPos, yPos);
		}
		g.dispose();
		try {
			String nombre="images/Q"+id+".jpg";
			ImageIO.write(image, "JPG", new File(nombre));
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.TimerTask;
import twitter4j.Query;
import twitter4j.QueryResult;
import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.conf.ConfigurationBuilder;

public class TweetRetriever extends TimerTask{
	public void run(){
		java.sql.Connection connection = null; 
		java.sql.Statement statement = null;
		ResultSet resultSet = null; 
		String driverName = "com.mysql.jdbc.Driver"; try {
			Class.forName(driverName);
		} catch (ClassNotFoundException e) {
			System.out.println("No se ha podido cargar el driver");
			e.printStackTrace();
		}
		try {
			FileReader FichEntrada;
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
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} 
		String[] answers =new String[4];
		answers[0]="A";
		answers[1]="B";
		answers[2]="C";
		answers[3]="D";
		for(int i=1;i<10;i++){
			for(int j=0;j<4;j++){
				String hashtag="Q"+i+answers[j];
				Query query = new Query(hashtag);
				try {
					statement = connection.createStatement();
					Twitter twitter=this.Credenciales();
					QueryResult result= twitter.search(query);
					for (Status status : result.getTweets()) {
						//Insertar en la base de datos los tweets encontrados
						String resultado="INSERT INTO tweet(user_id,id_quiz,text,answer,date,id_tweet) VALUES (?,?,?,?,?,?)";
						java.sql.PreparedStatement preparedStatement=connection.prepareStatement(resultado);
						preparedStatement.setFloat(6,status.getId());
						preparedStatement.setFloat(1,status.getUser().getId());
						preparedStatement.setInt(2, i);
						preparedStatement.setString(3,status.getText());
						preparedStatement.setString(4, answers[j]);
						preparedStatement.setInt(5, status.getCreatedAt().getDate());
						preparedStatement.executeUpdate();
						System.out.println("Se ha actualizado la BBDD");
					}
				} catch (SQLException e) {
					System.out.println("No se ha podido insertar el texto correctamente en la base de datos");
				}catch (TwitterException e) {
					System.out.println("La búsqueda no se ha realizado correctamente");
					e.printStackTrace();
				}
			}
		}
	}
	public Twitter Credenciales(){
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
}

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.sql.DriverManager;
import java.util.TimerTask;
import java.sql.ResultSet;
import java.sql.SQLException;

public class DailyTweet extends TimerTask{
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
			//Los datos para entrar en la base de datos se encuentran en el archivo confBBDD.txt
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
			statement = connection.createStatement();
			//Se realiza una consulta para obtener la primera pregunta que no haya sido publicada
			resultSet= statement.executeQuery("SELECT * FROM quiz where publicado=0");
			if(resultSet.next()){
				int id=resultSet.getInt("id");
				//Se llama a la clase SendTweet con el identificador correspondiente
				new SendTweet(id);
			}
			resultSet.close();
			statement.close();
			connection.close();
		} catch (SQLException e) {
			System.out.println("No se pudo realizar la consulta");
			e.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
}

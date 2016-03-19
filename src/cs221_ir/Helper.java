package cs221_ir;


import java.net.MalformedURLException;
import java.net.URI;
import java.net.URISyntaxException;
import java.net.URL;

public class Helper {
	public static String removePath(String url) {
		try {
			//URI uri = new URI(url.replaceAll(" ", "%20"));
			//System.out.println("URL: "+url);
			//URI uri = new URI(url);
			URL url2 = new URL(url);
			//return uri.getScheme() + "://" + uri.getAuthority();
                        if(url2.getHost().contains("www.")){
                            return url2.getHost().substring("www.".length());
                        }
			return url2.getHost();
		}
		//catch (URISyntaxException e) {
			//System.out.println("Error removing path from: " + url);
			//e.printStackTrace();
		//} 
	   catch (MalformedURLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		return null;
	}
}


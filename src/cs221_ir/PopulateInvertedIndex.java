package cs221_ir;

import java.io.ByteArrayInputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.PrintWriter;
import java.io.Serializable;
import java.io.UnsupportedEncodingException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;



import org.jsoup.Jsoup;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import cs221_ir.TokenizerClass;

class MyPair
{
    private  String key;
    private String value;

    public MyPair(String aKey, String aValue)
    {
        key   = aKey;
        value = aValue;
    }

    public MyPair() {
    	
    }
    public String key()   { return key; }
    public String value() { return value; }
}

class Post implements Serializable{
	public Post(){
            istitle = false;
            isanchor = false;
	}
    public	   Integer documentId;
    public     String documentUrl; 
    public	   Double tfIdf;
    public	   ArrayList<Integer> positions = new ArrayList<Integer>();
    public	   int termFrequency=0;
    public 	   int position;
    public        Boolean istitle;
    public        Boolean isanchor;
    
}

class PostingClass implements Serializable{
	ArrayList <Post> postingObject = new ArrayList<Post>();
}


public class PopulateInvertedIndex {

    private static Connection connect = null;
    private static Statement statement = null;
    private static PreparedStatement preparedStatement = null;
    private static ResultSet resultSet = null;
    private static HashSet<String> urls = null;
    private static List<String> alltokens = null;
    public static HashMap<String, PostingClass> hmap = new HashMap<String, PostingClass>();
    public static HashMap<Integer, Integer> outlinks = new HashMap<Integer, Integer>();
    public static HashMap<Integer, Integer> inlinks = new HashMap<Integer, Integer>();
    
    static String line = "";
    static int docId = 1;


    public static void preliminaryDeletionOfTables() {
        if (urls != null) {
            urls.clear();
        }
        try {
            statement = connect.createStatement();
            String deleteDocumentId = "DROP TABLE IF EXISTS documentid";
            statement.executeUpdate(deleteDocumentId);
            String deleteInvertedIndex = "DROP TABLE IF EXISTS invertedindex";
            statement.executeUpdate(deleteInvertedIndex);
//            String deleteInvertedIndex1 = "DROP TABLE IF EXISTS invertedindex1";
//            statement.executeUpdate(deleteInvertedIndex1);
//            String deleteIdf = "DROP TABLE IF EXISTS tfidftable";
//            statement.executeUpdate(deleteIdf);
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }

    public static void preliminaryCreationOfTables() {
        if (urls != null) {
            urls.clear();
        } else {
            urls = new HashSet<String>();
        }
        PreparedStatement dropTable = null;
        try {
            statement = connect.createStatement();
            String createDocumentId = "CREATE TABLE documentid "
                    + "(id INTEGER not NULL, "
                    + " documenturl VARCHAR(255), "
                    + " pagerank DOUBLE, "
                    + " PRIMARY KEY ( id ))";
            statement.executeUpdate(createDocumentId);
            String createInvertedIndex = "CREATE TABLE invertedindex "
                    + "(token VARCHAR(255) not NULL, "
                    + " posting MEDIUMBLOB, "
                    + " PRIMARY KEY ( token ))";
            statement.executeUpdate(createInvertedIndex);
//            String createInvertedIndex1 = "CREATE TABLE invertedindex1 "
//                    + "(token VARCHAR(255) not NULL, "
//                    + " posting BLOB, "
//                    + " PRIMARY KEY ( token ))";
//            statement.executeUpdate(createInvertedIndex1);
//            String createIdfQuery = "CREATE TABLE tfidftable "
//                    + "(token VARCHAR(255) not NULL, "
//                    + " tfidfvalue VARCHAR (42000), "
//                    + " PRIMARY KEY ( token ))";
//            statement.executeUpdate(createIdfQuery);
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }

    
    
    
    public static String getHref(String name) {
        String value = "";
        value += name.replace("\\", "/");
        
        value = value.split("/STORAGE/WEBDATAHTML/")[1];
        return "http://www." + value;
    }
    
    public static String getURL(String key){
        String url = "";
        if(key.contains("www..")){
            url = key.substring(key.indexOf("www..") + "www..".length());
        }else if(key.contains("www.")){
            url = key.substring(key.indexOf("www.") + "www.".length());
        }
        return "http://" + url;
    }
    
    public static String getBackFileNameFromHref(String name) {
        String value = "";
        //value = name.replace("/", "\\");
        value = name.substring("http://www.".length());
        return "STORAGE/WEBDATAHTML/" + value;
    }

    public static void addLinksToList(String path, TokenizerClass objectOfUtilClass) throws FileNotFoundException, SQLException {
        File root = new File(path);
        File[] list = root.listFiles();
        if (list == null) {
            System.out.println("WEBDATAHTML IS EMPTY");
            return;
        }
        
        for (File f : list) {
            if (f.isDirectory()) {
                addLinksToList(f.getAbsolutePath(), objectOfUtilClass);
            } else {
                urls.add(getHref(f.getAbsolutePath()));
            preparedStatement = connect.prepareStatement("INSERT into documentid VALUES (?, ?, ?)");
            preparedStatement.setInt(1, docId);
            preparedStatement.setString(2, getHref(f.getAbsolutePath()));
            preparedStatement.setDouble(3, 1);
            preparedStatement.executeUpdate();
            docId = docId + 1;
            }
        }
    }

    public static int getDocumentIdFromURL(String url) throws SQLException {
        preparedStatement = connect.prepareStatement("SELECT id from documentid WHERE documenturl = ?");
        preparedStatement.setString(1, url);
        resultSet = preparedStatement.executeQuery();
        while (resultSet.next()) {
            return resultSet.getInt("id");
        }
        return -1;
    }

    public static String getDocumentURLFromId(int id) throws SQLException {
        preparedStatement = connect.prepareStatement("SELECT documenturl from documentid WHERE id = ?");
        preparedStatement.setInt(1, id);
        resultSet = preparedStatement.executeQuery();
        while (resultSet.next()) {
            return resultSet.getString("documenturl");
        }
        return "";
    }

    public static void initializeDB() {
        preliminaryDeletionOfTables();
        preliminaryCreationOfTables();
    }

    public static Boolean tokenExists(String token) throws SQLException {
       if(hmap.containsKey(token)){
           return true;
       }else {
           return false;
       }
    }
    
   
    
    public static PostingClass getPosting(String token) throws SQLException {
       return hmap.get(token);
    }
   
 
//    public static double getIdfForToken(String token, double numOfDocuments) throws SQLException {
//        String posting = (String) getPosting(token);
//        double l = 0.0;
//        for (int y = 0; y < posting.length(); y++) {
//            if (posting.charAt(y) == '|') {
//                l++;
//            }
//        }
//        return (1 + Math.log(numOfDocuments / l));
//    }

    private static void insertIdfValue(String token, String idf) throws SQLException {
        preparedStatement = connect.prepareStatement("INSERT INTO tfidftable VALUES (?, ?)");
        preparedStatement.setString(1, token);
        preparedStatement.setString(2, idf);
        preparedStatement.executeUpdate();
    }

    public static void populateidfTable() throws SQLException , IOException, ClassNotFoundException{
        int numOfDocuments = getDocumentCount();
        double idf = 0.0;
//        HashSet<String> alltokensSet = new HashSet<String>();
//        for (String s : alltokens) {
//            alltokensSet.add(s);
//        }
        
//        String s = "SELECT token from invertedindex";
//        ResultSet rs1 = statement.executeQuery(s);
//        String token = "";
//        while(rs1.next()){
//        	token = rs1.getString("token");
        
        PostingClass postObject = null;
        ArrayList<Post> obj = null;
        for (String key : hmap.keySet())  {
        
        	
        	postObject = getPosting(key);
        	obj = postObject.postingObject;
        	Post p;
                idf = 1 + Math.log(numOfDocuments/obj.size());
        	 for (int counter = 0; counter < obj.size(); counter++) { 		      
         		p = obj.get(counter);
                        p.tfIdf = (1 + Math.log(p.termFrequency)) * idf;
                if(p.isanchor && p.istitle){
                	p.tfIdf = p.tfIdf;
                }else if(p.isanchor){
                	p.tfIdf = 0.7 * p.tfIdf;
                }else if(p.istitle){
                	p.tfIdf = 0.8 * p.tfIdf;
                }else{
                	p.tfIdf = 0.5 * p.tfIdf;
                }
         		obj.set(counter, p);
         		
//         		if("security".equals(key)){
//         			System.out.println("id : " + p.documentId + " tfidf : " + p.tfIdf);
  //       		}
         		
     }
        	 Collections.sort(obj, new tfidfcomparator());
        	 
        	 
        	 postObject.postingObject = obj;
         	
        	 updateToken(key, postObject);
//       	 postObject = getPosting(key);
//         	obj = postObject.postingObject;
//         	
//         	for (int counter = 0; counter < obj.size(); counter++) { 		      
//          		p = obj.get(counter);
//                         
//          		
//          		if("security".equals(key)){
//          			System.out.println("url : " + p.documentUrl + " tfidf : " + p.tfIdf);
//          		}
//        	
//        	
//        }
        }
    }
        
        
       
        
         
               
            
        
    
    
        public static List<MyPair> result(String token) throws SQLException, IOException, ClassNotFoundException{

    	HashMap <String, Double> results = new HashMap<String, Double>();
    	List<MyPair> output = new ArrayList<MyPair>();
    	
    	ArrayList <String> queryTokens = new ArrayList<String>();
    	String delim = "[^a-zA-Z]+";

		String[] l = token.split(delim);
		
	if(l.length == 0)
		return output;
			

		for (int j = 0; j < l.length; j++) {
			if (!l[j].equals("")){
				
				PostingClass postObject1 = readFromDB(l[j].toLowerCase());
				if(postObject1 != null)
				queryTokens.add(l[j].toLowerCase());
			}
		}
		int limit;
		if(queryTokens.size() == 1) {
    	PostingClass postObject = readFromDB(queryTokens.get(0));
    	if(postObject == null){
    		return output;
    	}
    	ArrayList<Post> post = postObject.postingObject;
    	Post p;
    	 
    	if(20<post.size())
    		limit = 20;
    	else limit = post.size();
    	
    	for (int counter = 0; counter < limit; counter++) { 		      
            		p = post.get(counter);
            		
            		String url = p.documentUrl ;
            	        String	value = getPositions(p.documentUrl,p.positions);
            	        delim = " ";

                   	 l = value.split(delim);
                        	
                        	if(l.length>50){
                        		
                        		value = "";
                        	for(int le = 0; le<50 ; le ++){
                        		
                        		value += l[le];
                        	}
                        		
                        	}
                       	 
            	        
            	        MyPair pair = new MyPair(url,value);
            	        
            		output.add(pair);
            		
    	}
    	
    	
		}
		
		else if(queryTokens.size() > 1){
			String url;
        	Double tfidf;
        	String value;
			for (String key : queryTokens){
				
				PostingClass postObject = readFromDB(key);
				ArrayList<Post> post = null;
				
				if(postObject != null){
            	post  = postObject.postingObject;
            	
				Post p = null;
            	
            	
            	for (int counter = 0; counter < post.size(); counter++) { 	
                        
                    		p = post.get(counter);
                    		
                    		url = p.documentUrl;
                    		 tfidf = p.tfIdf;
                    		
                    		if(results.containsKey(url)){
                    		tfidf	= results.get(url) + tfidf;
                    		
                    		results.put(url, tfidf);
                    		}
                    		
                    		else results.put(url, tfidf);
				
			}
			}
			}
            	
            	List<Entry<String, Double>> orderedList = new ArrayList<>(results.entrySet());
                Collections.sort(orderedList, new Comparator<Map.Entry<String, Double>>() {
                    @Override
                    public int compare(Map.Entry<String, Double> o1, Map.Entry<String, Double> o2) {
                        return ((o2.getValue()).compareTo(o1.getValue()) == 0)?(o1.getKey().compareTo(o2.getKey())):(o2.getValue()).compareTo(o1.getValue());
                    }
                });
                
                ArrayList <String> finalURLS = new ArrayList<String>();
                
                if(25<orderedList.size()){
                	limit = 25;
                }
                
                else limit = orderedList.size();
                
                for(int i = 0 ; i<limit; i++){
                	
                	Map.Entry<String, Double> obj = orderedList.get(i);
                	 url = obj.getKey();
                	 
                	 String s1,s2;
                	 
                	 s1 = queryTokens.get(0);
                	 s2 = queryTokens.get(1);
                	 
                	 
                	 
                	 PostingClass postObject = readFromDB(s1);
                 	ArrayList<Post> post = postObject.postingObject;
                 	Post p1=null,p2=null;
                 	
                 	
                 	for (int counter = 0; counter < post.size(); counter++) { 	
                             
                         		p1 = post.get(counter);
                         		
                         		if(p1.documentUrl.equals(url))
                         			break;
                         		p1 = null;
     			}
                 	
                 	postObject = readFromDB(s2);
                 	post = postObject.postingObject;
                 	
                 	for (int counter = 0; counter < post.size(); counter++) { 	
                        
                 		p2 = post.get(counter);
                 		
                 		if(p2.documentUrl.equals(url))
                 			break;
                 		p2 = null;
				
			}
                 	int flag;
                 	int diff=0;
                 	value = "";
                 	
                 	if(p1 != null && p2!=null)
                  diff = printClosest(p1.positions,p2.positions);
                 	
                 	
                 	if(diff == 0 && (p1 != null || p2 != null)){
                 		
                 		if(p1 == null){
                 			value = getPositions(url, p2.positions);
                 		}
                 		
                 		else 
                 			value = getPositions(url, p1.positions);
                 	}
                 	
                 	else if(diff == -1){
                 		
                 		value = getPositions(url, p1.positions) + "\n" + getPositions(url,p2.positions) ;
                 	}
                 	
                 	else if(p1 == null && p2 == null){
                 		
                 		for (String key : queryTokens){
                 			
                 			postObject = readFromDB(key);
                         	post = postObject.postingObject;
                         	flag = 0;
                         	for (int counter = 0; counter < post.size(); counter++) { 	
                                
                         		p1 = post.get(counter);
                         		
                         		if(p1.documentUrl.equals(url)){
                         			flag = 1;
                         			break;
                         		}
                         		
                         		if(flag == 1){
                         			value = getPositions(url, p1.positions);
                         			break;
                         		}
                         			
                         		
        				
        			}
                         	
                         	
                 			
                 		}
                 		
                 	}
                 	
                 	else value = getAtPosition(url, diff);
                 	
                 	 delim = " ";

            	 l = value.split(delim);
                 	
                 	if(l.length>50){
                 		
                 		value = "";
                 	for(int le = 0; le<50 ; le ++){
                 		
                 		value += l[le];
                 	}
                 		
                 	}
                	 
                	 
                	 
                	//value = String.valueOf(obj.getValue()); //getMultiplePositions(url, queryTokens );
                	MyPair pair = new MyPair(url,value);
                	output.add(pair);
                }
                //getPositions1(orderedList, queryTokens);
			
		}
		

		results.clear();
    	return output;
    }
        
        public static String getAtPosition(String url, int pos) throws SQLException, IOException, ClassNotFoundException {
        	String output="";
        	
        	TokenizerClass objectOfUtilClass = new TokenizerClass();
            ArrayList <String> alltokens1 = new ArrayList<String>();
            
            File sf = new File("StopWordList.txt");
            List<String> stopwords = new ArrayList<String>();
            stopwords = objectOfUtilClass.tokenizeFile(sf.getAbsolutePath());
            
            String lpath = getBackFileNameFromHref(url);
            alltokens1 = (ArrayList<String>) objectOfUtilClass.tokenizeFileBody(lpath);
            alltokens1.removeAll(stopwords);
            
            if((alltokens1.size() - pos)<10){
        		
        		if(pos <5){
        			
        			
        			for(int counter = 0; counter< pos; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos> 5){
        			
        			for(int counter = pos-5; counter< pos; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		for(int counter = pos; counter<alltokens1.size(); counter++){
        			output += alltokens1.get(counter);
        			output += " ";
        		}
        	}
        	
        	else {
        			if(pos <5){
        			
        			
        			for(int counter = 0; counter< pos; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos > 5){
        			
        			for(int counter = pos-5; counter< pos; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        			

            		for(int counter = pos; counter<pos + 9; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		
        	}
            
            return output;
            
        }
    
      public static  int printClosest(ArrayList<Integer> pos1, ArrayList<Integer> pos2){
    	  
    	  int m = pos1.size();
    	    int n = pos2.size();
    	    int i = 0;
    	    int j = 0;
    	    int min = Integer.MAX_VALUE;
    	    int a=0, b=0;
    	    while (i < m && j < n) {
    	        if (Math.abs(pos1.get(i)- pos2.get(j)) < min) {
    	            min = Math.abs(pos1.get(i)- pos2.get(j));
    	            a = pos1.get(i);
    	            b = pos2.get(j);
    	            if (min == 0)
    	               break; /* absolute difference cannot be less than 0 */
    	        }
    	       if (pos1.get(i) < pos2.get(j)) {
    	           i++;
    	       }
    	       else {
    	           j++;
    	       }  
    	    }
    	    
    	    if(Math.abs(a- b) > 10 )
    	    	return -1;
    	    
    	    else return a>b?b:a;
        }
        
    public static String getPositions(String url, ArrayList<Integer> pos) throws SQLException, IOException, ClassNotFoundException {
    	String output="";
    	
    	TokenizerClass objectOfUtilClass = new TokenizerClass();
        ArrayList <String> alltokens1 = new ArrayList<String>();
        
        File sf = new File("StopWordList.txt");
        List<String> stopwords = new ArrayList<String>();
        stopwords = objectOfUtilClass.tokenizeFile(sf.getAbsolutePath());
        
        String lpath = getBackFileNameFromHref(url);
        alltokens1 = (ArrayList<String>) objectOfUtilClass.tokenizeFileBody(lpath);
        alltokens1.removeAll(stopwords);
        
       if(pos.size() == 1){
        	
        	if((alltokens1.size() - pos.get(0))<10){
        		
        		if(pos.get(0) <5){
        			
        			
        			for(int counter = 0; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos.get(0) > 5){
        			
        			if(pos.get(0)>alltokens1.size())
        				pos.set(0,7);
        			
        			for(int counter = pos.get(0)-5; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		for(int counter = pos.get(0); counter<alltokens1.size(); counter++){
        			output += alltokens1.get(counter);
        			output += " ";
        		}
        	}
        	
        	else {
        			if(pos.get(0) <5){
        			
        			
        			for(int counter = 0; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos.get(0) > 5){
        			
        			for(int counter = pos.get(0)-5; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        			

            		for(int counter = pos.get(0); counter<pos.get(0)+8; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		
        	}
    }
        
        
        else if(pos.size()>1){
        	
        	if((pos.get(1) - pos.get(0)) < 10 ){
        		
        			if(pos.get(0) <5){
        			
        			
        			for(int counter = 0; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos.get(0) > 5){
        			
        			for(int counter = pos.get(0)-5; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        			for(int counter = pos.get(0); counter<pos.get(1); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
        			}
        	
        			
        			if(pos.size() == 2){
        				
        				if(alltokens1.size() - pos.get(1)<9){
                			for(int counter = pos.get(1); counter<alltokens1.size(); counter++){
                    			output += alltokens1.get(counter);
                    			output += " ";
                			}
                				}
                			
                			else {
                				for(int counter = pos.get(1); counter< pos.get(1)+9; counter++){
                        			output += alltokens1.get(counter);
                        			output += " ";
                    			}
                			}
        			}
        			
        			else if(pos.size()>2){
        				
        				if((pos.get(2) - pos.get(1)) < 10 ){
        					for(int counter = pos.get(1); counter<pos.get(2); counter++){
                    			output += alltokens1.get(counter);
                    			output += " ";
                			}
        					
        					if(pos.get(2) != alltokens1.size()-1){
        						
        						output += alltokens1.get(pos.get(2) + 1);
        						output += " ";
        					}
        				}
        				
        				else {
        					for(int counter = pos.get(1); counter < pos.get(1)+ 10 ; counter++){
                    			output += alltokens1.get(counter);
                    			output += " ";
                			}
        				}
        				
        			}
        
        }
        	else {
        		if(pos.get(0) <5){
        			
        			
        			for(int counter = 0; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        		
        		else if(pos.get(0) > 5){
        			
        			for(int counter = pos.get(0)-5; counter< pos.get(0); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
            		}
        		}
        			for(int counter = pos.get(0); counter<pos.get(0)+8; counter++){
            			output += alltokens1.get(counter);
            			output += " ";
        			}
        			
        			output += alltokens1.get(pos.get(1)-1);
        			output += " ";
        			
        			if(alltokens1.size() - pos.get(1)<9){
        			for(int counter = pos.get(1); counter<alltokens1.size(); counter++){
            			output += alltokens1.get(counter);
            			output += " ";
        			}
        				}
        			
        			else {
        				for(int counter = pos.get(1); counter<pos.get(1)+9; counter++){
                			output += alltokens1.get(counter);
                			output += " ";
            			}
        			}
				
        	}
        }
        
        
    	return output;
    	
    }

    public static void populateindex() throws SQLException, IOException, ClassNotFoundException {
        TokenizerClass objectOfUtilClass = new TokenizerClass();
        alltokens = new ArrayList<String>();
        int documentId = 0;
        int count = 0;
        int flag = 0;
        File sf = new File("StopWordList.txt");
        List<String> stopwords = new ArrayList<String>();
        stopwords = objectOfUtilClass.tokenizeFile(sf.getAbsolutePath());
        String sql = "SELECT * from documentid";
        ResultSet rs = statement.executeQuery(sql);
        String fileURL = "";
        String newf = "";
        Boolean isanchor = false;
        Boolean istitle = false;
        while (rs.next()) {
            
          documentId = rs.getInt("id");
          fileURL = rs.getString("documenturl");
          newf = fileURL;
          if(fileURL.indexOf("?") != -1){
              newf = fileURL.substring(0, fileURL.indexOf("?")) + fileURL.substring(fileURL.indexOf("?") + 1);
          }
          
          System.out.println("Document : " + newf + " ,Document id : " + documentId);
            
            alltokens.clear();
            
            alltokens = objectOfUtilClass.tokenizeFileBody(getBackFileNameFromHref(newf));
            ArrayList <String> anchorTokens = (ArrayList <String>) objectOfUtilClass.tokenizeFileAnchors(getBackFileNameFromHref(newf));
            ArrayList <String> titleTokens = (ArrayList <String>) objectOfUtilClass.tokenizeFileTitle(getBackFileNameFromHref(newf));
            alltokens.removeAll(stopwords);
            int position  = 0;
            for (String token : alltokens) {
                isanchor = false;
                istitle = false;
            	position++;
                if (tokenExists(token)) {
                    if(anchorTokens.contains(token)){
                        isanchor = true;
                    }
                    if(titleTokens.contains(token)){
                        istitle = true;
                    }
                        flag = 0;
                	PostingClass postObject = getPosting(token);
                	ArrayList<Post> post = postObject.postingObject;
                	Post p;
                	for (int counter = 0; counter < post.size(); counter++) { 	
                            
                        		p = post.get(counter);
                        		if(p.documentId == documentId)
                        		{
                        			flag = 1;
                        			p.termFrequency++;
                        			p.positions.add(position);
                        			post.set(counter, p);
                                                if(isanchor){
                                                   p.isanchor = true;
                                                }
                                                if(istitle){
                                                    p.istitle = true;
                                                }
                        			postObject.postingObject = post;
                                               
                        			updateToken(token, postObject);
                        			break;
                        		}
                    }
                	
                	if(flag ==0){
                		Post newPosting = new Post();
                		newPosting.documentId = documentId;
                		newPosting.termFrequency = 1;
                		newPosting.documentUrl = getDocumentURLFromId(documentId);
                		newPosting.position = position;
                		newPosting.positions.add(position);
                               if (isanchor) {
                                    newPosting.isanchor = true;
                            }
                            if (istitle) {
                                newPosting.istitle = true;
                            }
                		post.add(newPosting);
                                postObject.postingObject = post;
                		updateToken(token, postObject);
                	}
                	
                	
                	
                } else {
                	PostingClass posting = new PostingClass() ;
                	ArrayList <Post> pp = new ArrayList<Post>();
                	Post p = new Post();
                	
                	p.documentId = documentId;
                	p.termFrequency = 1;
                	p.documentUrl = getDocumentURLFromId(documentId);
                	p.position = position; 
                	p.positions.add(position);
                         if(isanchor){
                                                   p.isanchor = true;
                                                }
                                                if(istitle){
                                                    p.istitle = true;
                                                }
                	pp.add(p);
                	//System.out.println("new : " + p.documentId + " "+ p.documentUrl+ " " + p.termFrequency+ " " + p.position);
                	posting.postingObject = pp;
                	insertToken(token, posting);
                	 
                }
            }
        }
    }

    private static void insertToken(String token, PostingClass posting) throws SQLException {
//        preparedStatement = connect.prepareStatement("INSERT into invertedindex VALUES (?, ?)");
//        preparedStatement.setString(1, token);
//        preparedStatement.setString(2, posting);
//        preparedStatement.executeUpdate();
        hmap.put(token, posting);
    }

    private static void updateToken(String token, PostingClass newPosting) throws SQLException {
//        preparedStatement = connect.prepareStatement("UPDATE invertedindex SET posting = ? where token = ?");
//        preparedStatement.setString(1, newPosting);
//        preparedStatement.setString(2, token);
//        preparedStatement.executeUpdate();
          hmap.put(token, newPosting);
    }

    private static int getDocumentCount() throws SQLException {
        preparedStatement = connect.prepareStatement("SELECT COUNT(*) as count from documentid");
        resultSet = preparedStatement.executeQuery();
        int c = 0;
        while (resultSet.next()) {
            if (resultSet.getInt("count") > 0) {
                return resultSet.getInt("count");
            }
            break;
        }
        return 0;
    }

    public static void main(String[] args) throws ClassNotFoundException, SQLException, FileNotFoundException, UnsupportedEncodingException, IOException {
        String JDBC_DRIVER = "com.mysql.jdbc.Driver";
        String DB_URL = "jdbc:mysql://localhost:8889/ir";
        String USER = "root";
        String PASS = "root";
        Class.forName("com.mysql.jdbc.Driver");
        connect = DriverManager.getConnection(DB_URL, USER, PASS);
        statement = connect.createStatement();
      // initializeDB();
      //  TokenizerClass objectOfUtilClass = new TokenizerClass();
      //  String path = "STORAGE/WEBDATAHTML/";
      // addLinksToList(path, objectOfUtilClass);
       // populateindex();
       // populateidfTable();
       // insertToDB();
        List<MyPair> o = result("  ramesh rajesh lopes  ");
        for(int counter = 0; counter<o.size();counter++){
        	
        	MyPair pair = o.get(counter);
            System.out.println("Key : " + pair.key() + " , Values : " + pair.value());
        }
        
      //  urls.clear();
       // connect.close();
    }
    
    public static void insertToDB() throws SQLException{
        int i = 0;
        for(String k : hmap.keySet()){
            preparedStatement = connect.prepareStatement("INSERT INTO invertedindex VALUES (?, ?)");
            preparedStatement.setString(1, k);
            preparedStatement.setObject(2, hmap.get(k));
            preparedStatement.executeUpdate();
         //   System.out.println("Inserting : " + i);
          //  i = i + 1;
        }
    }
    
    public static PostingClass readFromDB(String token) throws SQLException, IOException, ClassNotFoundException {
       // String s = "SELECT posting from invertedindex where ";
        preparedStatement = connect.prepareStatement("SELECT posting from invertedindex WHERE token = ?");

        preparedStatement.setString(1, token);
        ResultSet rs1 = preparedStatement.executeQuery();
        Object blob;
        PostingClass postObject = null; 
        while (rs1.next()) {
            blob = rs1.getObject("posting");
            byte[] st = (byte[]) blob;
            ByteArrayInputStream bp = new ByteArrayInputStream(st);
            ObjectInputStream oi = new ObjectInputStream(bp);
           postObject = (PostingClass) oi.readObject();
//            ArrayList<Post> post = postObject.postingObject;
//            System.out.println("Printing: " + post.get(0).documentId);
        }
        
        return postObject;
    }

    private static void populateInLinks() {
        
    }

    private static void populateOutLinks() {
        
    }
}
class tfidfcomparator implements Comparator<Post> {
    @Override
    public int compare(Post o1, Post o2) {
        if(o2.tfIdf.compareTo(o1.tfIdf) == 0){
        	return o1.documentId.compareTo(o2.documentId);
        }else{
        	return o2.tfIdf.compareTo(o1.tfIdf);
        }
    }
}
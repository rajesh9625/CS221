package cs221_ir;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileFilter;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.StringTokenizer;
import java.util.Map.Entry;



import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.net.*;
import java.util.Set;
import org.omg.PortableInterceptor.SYSTEM_EXCEPTION;


public class URLStatistics {
	
	private long totalPages=0;
	private long totalUniquePages=0;
	private List<Frequency> subdomainFrequencies;

	
	

	public long getTotalUniquePages() {
		return this.totalUniquePages;
	}

	public List<Frequency> getSubdomainFrequencies() {
		return this.subdomainFrequencies;
	}
	
	public  void printFrequencies(List<Frequency> frequencies, long uniquePages) {
		PrintWriter out = null;
		try
		{	
		 out = new PrintWriter(new File("STATS/SUBDOMAIN.txt"));
		}
		
		catch(FileNotFoundException fx){
			System.out.println(fx);
		}
		
		
		
		out.println("Total Unique Pages : "+ " "+uniquePages);
                out.println("\n\n\nTotal Unique Subdomains : "+ " "+frequencies.size());
		out.println();
                int count = 0;
		for(int i = 0; i < frequencies.size(); i++){
			
			out.println(frequencies.get(i).toString());
                        count += frequencies.get(i).getFrequency();
		}
               
		out.close();

	}
	public static ArrayList<Map.Entry<String, Integer>> sortKey(HashMap<String,Integer> hashmap){
		ArrayList<Map.Entry<String, Integer>> l = new ArrayList<Map.Entry<String, Integer>>(hashmap.entrySet());
		Collections.sort(l,new Comparator<Map.Entry<String, Integer>>(){

			
			public int compare(Entry<String, Integer> e1,
					Entry<String, Integer> e2) {
				
	
				
				if(e1.getValue().compareTo(e2.getValue()) != 0) 
					return e2.getValue().compareTo(e1.getValue());
				
			else 
					return e1.getKey().compareTo(e2.getKey());	
			}
		});
		
		return l;
	}
	
	public void runStats(File fileName)  throws IOException {

		
		File[] directories = new File("STORAGE/WEBDATA").listFiles(new FileFilter() {
		    @Override
		    public boolean accept(File file) {
		        return file.isDirectory();
		    }
		});
		BufferedReader in = null;
		long totalCount = 0;
		Set<String> uniquePages = new HashSet<String>();
	
		in = new BufferedReader(new FileReader(fileName));
		String line = null;
		
		
		while ((line = in.readLine()) != null) {
			line = line.replaceAll("\\s+", " ");
			StringTokenizer st = new StringTokenizer(line, " ");
			String url;
			while (st.hasMoreTokens()) {
				url = st.nextToken();
				if (!url.equals("")){
					totalCount++;
				//	String urlWoutQuery = Helper.removeQuery(url);
					if (url != null && url.length() > 0) {
						
						uniquePages.add(url);
					}
				}
			
			}
		}
                System.out.println("SET SIZE : " + uniquePages.size());
		
		in.close();
		

		// Count the number of unique subdomains
		HashMap<String, Integer> subdomainMap = new HashMap<String, Integer>();
		for (String uniqueUrl : uniquePages) {
			String urlWithoutPath = Helper.removePath(uniqueUrl);
			if (urlWithoutPath == null)
				continue;

			// Increment count
			Integer currentCount = subdomainMap.get(urlWithoutPath);
			if (currentCount == null)
				currentCount = 0;
			subdomainMap.put(urlWithoutPath, currentCount + 1);
		}
		
		ArrayList<Map.Entry<String, Integer>> list = sortKey(subdomainMap);
		subdomainMap.clear();
		//-- Convert to frequency list
		ArrayList<Frequency> frequencies = new ArrayList<Frequency>();
		for (int j = 0; j < list.size(); j++) {

			Map.Entry<String, Integer> m = (Map.Entry<String, Integer>) list.get(j);

			String key = (String) m.getKey();
			Integer value = (Integer) m.getValue();

			Frequency f = new Frequency(key, value);

			frequencies.add(f);

		}

		
		

		 
		this.totalUniquePages = totalCount;
		this.subdomainFrequencies = frequencies;
		printFrequencies(frequencies,this.totalUniquePages);
		
		
	}
}

package cs221_ir;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 * @author Prash
 */
public class FrequencyOfWords {

    private long noOfTokens;
    
    public FrequencyOfWords(){
        noOfTokens = 0;
    }
    
    public List<Entry<String, Double>> computeWordFrequencies(List<String> tokenList) {
        noOfTokens = tokenList.size();
        HashMap<String, Double> returnMap = new HashMap<>();
        List <Entry<String, Double>> e = new ArrayList<>();
        returnMap.clear();
        if (tokenList.isEmpty()) {
            return e;
        }
        String token;
        for (int i = 0; i < tokenList.size(); i++) {
            token = tokenList.get(i);
            if (returnMap.containsKey(token)) {
                returnMap.put(token, returnMap.get(token) + 1);
            } else {
                returnMap.put(token, 1D);
            }
        }
        List<Entry<String, Double>> frequencyOrderedList = new ArrayList<>(returnMap.entrySet());
        Collections.sort(frequencyOrderedList, new Comparator<Map.Entry<String, Double>>() {
            @Override
            public int compare(Map.Entry<String, Double> o1, Map.Entry<String, Double> o2) {
                return ((o2.getValue()).compareTo(o1.getValue()) == 0)?(o1.getKey().compareTo(o2.getKey())):(o2.getValue()).compareTo(o1.getValue());
            }
        });
        return frequencyOrderedList;
    }

    public void print(List<Entry<String, Double>> frequencyOrderedList) {
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("C:\\Users\\Prash\\Documents\\NetBeansProjects\\InformationRetrievalProject1\\src\\informationretrievalproject1\\output2.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        System.out.println("Writing out unique tokens with frequencies ordered : \n");
        int count = 0;
        for (Map.Entry<String, Double> entry : frequencyOrderedList) {
            writer.println("Token : " + entry.getKey() + ", frequency : " + entry.getValue().intValue());
            writer.flush();
            count = count + 1;
        }
        //System.out.println("Successfully printed " + count + " tokens");
        writer.println("\nTotal Number of tokens including duplicates : " + noOfTokens);
        writer.println("\nSuccessfully printed " + count + " unique tokens");
        writer.flush();
    }
    
    public void print500(List<Entry<String, Double>> frequencyOrderedList) throws FileNotFoundException, UnsupportedEncodingException {
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("STATS/TOP500_WORDS.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        int count = 0;
        for (Map.Entry<String, Double> entry : frequencyOrderedList) {
            writer.println("Token : " + entry.getKey() + ", frequency : " + entry.getValue().intValue());
            writer.flush();
            count = count + 1;
            if(count == 500){
               // break;
            }
        }
        //System.out.println("Successfully printed " + count + " tokens");
        writer.println("\nTotal Number of tokens including duplicates : " + count);
        writer.println("\nSuccessfully printed " + " 500 " + " unique tokens");
        writer.flush();
    }
}

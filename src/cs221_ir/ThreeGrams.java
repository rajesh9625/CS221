package cs221_ir;

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
public class ThreeGrams {

    private long noOfTokens;
    
    public ThreeGrams(){
        noOfTokens = 0;
    }
    public List<Map.Entry<String, Double>> computeThreeGramFrequencies(List<String> tokenList) {
       
        int NVALUE = 3;
        HashMap<String, Double> returnMap = new HashMap<>();
        returnMap.clear();
        List <Entry<String, Double>> e = new ArrayList<>();
        if (tokenList.isEmpty()) {
            return e;
        }
        String threeGram = "";
        int k = 0;
        for (k = 0; k < (tokenList.size() - NVALUE + 1); k++) {
             
            int start = k;
            int end = k + NVALUE;
            threeGram = "";
            for (int j = start; j < end; j++) {
                threeGram += tokenList.get(j) + " ";
            }
            if (returnMap.containsKey(threeGram)) {
                returnMap.put(threeGram, returnMap.get(threeGram) + 1);
            } else {
                returnMap.put(threeGram, 1D);
            }
        }
        noOfTokens = k;
        List<Map.Entry<String, Double>> frequencyOrdered3GramList = new ArrayList<>(returnMap.entrySet());
        Collections.sort(frequencyOrdered3GramList, new Comparator<Map.Entry<String, Double>>() {
            @Override
            public int compare(Map.Entry<String, Double> o1, Map.Entry<String, Double> o2) {
                return ((o2.getValue()).compareTo(o1.getValue()) == 0)?(o1.getKey().compareTo(o2.getKey())):(o2.getValue()).compareTo(o1.getValue());
            }
        });
        return frequencyOrdered3GramList;
    }

    public void print(List<Map.Entry<String, Double>> frequencyOrdered3GramList) {
        int count = 0;
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("C:\\Users\\Prash\\Documents\\NetBeansProjects\\InformationRetrievalProject1\\src\\informationretrievalproject1\\output3.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        for (Map.Entry<String, Double> entry : frequencyOrdered3GramList) {
            writer.println("Token : " + entry.getKey() + ", frequency : " + entry.getValue());
            writer.flush();
            count = count + 1;
        }
        writer.println("\nTotal Number of tokens including duplicates : " + noOfTokens);
        writer.println("Successfully printed " + count + " unique 3 grams");
        writer.flush();
    }
    
    public void print20(List<Map.Entry<String, Double>> frequencyOrdered3GramList) {
        int count = 0;
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("STATS/TOP20_3Gram.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        for (Map.Entry<String, Double> entry : frequencyOrdered3GramList) {
            writer.println("Token : " + entry.getKey() + ", frequency : " + entry.getValue());
            writer.flush();
            count = count + 1;
            if(count == 20){
                break;
            }
        }
        writer.println("\nTotal Number of tokens including duplicates : " + noOfTokens);
        writer.println("Successfully printed " + "20" + " unique 3 grams");
        writer.flush();
    }
}

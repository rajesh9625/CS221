package cs221_ir;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;

import java.io.FileNotFoundException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.util.Comparator;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 * @author Prash
 */
public class Anagram {

    private long noOfTokens;
    public Anagram(){
        noOfTokens = 0;
    }
//    public void getAnagramListForToken(String permutationOfString, String content, List<String> validPermutationList) {
//        System.setProperty("wordnet.database.dir", "C:\\Program Files (x86)\\WordNet\\2.1\\dict");
//        WordNetDatabase database = WordNetDatabase.getFileInstance();
//        if (content.isEmpty()) {
//            Synset[] synsets = database.getSynsets(permutationOfString + content);
//            if(synsets.length > 0){
//                validPermutationList.add(permutationOfString + content);
//            }
//        } else {
//            for (int i = 0; i < content.length(); i++) {
//                getAnagramListForToken(permutationOfString + content.charAt(i), content.substring(0, i) + content.substring(i + 1, content.length()), validPermutationList);
//            }
//        }
//    }

//    public List<Map.Entry<String, ArrayList<String>>> detectAnagrams(ArrayList<String> tokenList) {
//        noOfTokens = tokenList.size();
//        HashMap<String, ArrayList<String>> returnMap = new HashMap<>();
//        returnMap.clear();
//        if (tokenList.isEmpty()) {
//            return (List<Map.Entry<String, ArrayList<String>>>) returnMap;
//        }
//        for (int i = 0; i < tokenList.size(); i++) {
//            String token = "";
//            token = tokenList.get(i);
//            if (returnMap.containsKey(token)) {
//                continue;
//            } else {
//                ArrayList values = new ArrayList();
//                char[] charString = token.toCharArray();
//                Arrays.sort(charString);
//                String sortedToken = String.valueOf(charString);
//                getAnagramListForToken("", sortedToken, values);
//                returnMap.put(token, values);
//            }
//        }
//          List<Map.Entry<String, ArrayList<String>>> frequencyOrderedList = new ArrayList<>(returnMap.entrySet());
//        Collections.sort(frequencyOrderedList, new Comparator<Map.Entry<String, ArrayList<String>>>() {
//            @Override
//            public int compare(Map.Entry<String, ArrayList<String>> o1, Map.Entry<String, ArrayList<String>> o2) {
//                return o1.getKey().compareTo(o2.getKey());
//            }
//        });
//        return frequencyOrderedList;
//    }
    
    public HashMap<String, List<String>> preCompute(){
        String filePath = "C:\\Users\\Prash\\Documents\\NetBeansProjects\\InformationRetrievalProject1\\src\\informationretrievalproject1\\allWords.txt";
        TokenizerClass obj = new TokenizerClass();
        List<String> tokens = obj.tokenizeFile(filePath);
        HashMap <String, List<String>> tokenMap = new HashMap<>();
        for (int i = 0; i < tokens.size(); i++) {
            String token = "";
            token = tokens.get(i);
            char [] ch = token.toCharArray();
            Arrays.sort(ch);
            String sortedToken = String.valueOf(ch);
            if (tokenMap.containsKey(sortedToken)) {
                List <String> values = tokenMap.get(sortedToken);
                if(!values.contains(token)){
                values.add(token);
                tokenMap.put(sortedToken, values);
                }
            } else {
                List <String> values = new ArrayList<>();
                values.add(token);
                tokenMap.put(sortedToken, values);
            }
        }
        return tokenMap;
    }
    
    public List<Map.Entry<String, ArrayList<String>>> detectAnagrams2(ArrayList<String> tokenList, HashMap<String, List<String>> populatedMap){
        noOfTokens = tokenList.size();
        HashMap<String, ArrayList<String>> returnMap = new HashMap<>();
        returnMap.clear();
        if (tokenList.isEmpty()) {
            return (List<Map.Entry<String, ArrayList<String>>>) returnMap;
        }
        
        for (int i = 0; i < tokenList.size(); i++) {
            String token = "";
            token = tokenList.get(i);
            char [] ch = token.toCharArray();
            Arrays.sort(ch);
            String sortedToken = String.valueOf(ch);
            if (returnMap.containsKey(token)) {
                continue;
            } else {
                if(populatedMap.containsKey(sortedToken)){
                    List <String> values = populatedMap.get(sortedToken);
                    returnMap.put(token, (ArrayList<String>) values);
                }else{
                    List <String> values = new ArrayList<>();
                    returnMap.put(token, (ArrayList<String>) values);
                }
            }
        }
        List<Map.Entry<String, ArrayList<String>>> frequencyOrderedList = new ArrayList<>(returnMap.entrySet());
        Collections.sort(frequencyOrderedList, new Comparator<Map.Entry<String, ArrayList<String>>>() {
            @Override
            public int compare(Map.Entry<String, ArrayList<String>> o1, Map.Entry<String, ArrayList<String>> o2) {
                return o1.getKey().compareTo(o2.getKey());
            }
        });
        return frequencyOrderedList;
    }

    public void print(List<Map.Entry<String, ArrayList<String>>> frequencyOrderedList) {
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("C:\\Users\\Prash\\Documents\\NetBeansProjects\\InformationRetrievalProject1\\src\\informationretrievalproject1\\output4.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        for (Map.Entry<String, ArrayList<String>> entry : frequencyOrderedList) {
            boolean flag = false;
            ArrayList list = (ArrayList) entry.getValue();
            int j = 0;
            for (j = 0; j < list.size(); j++) {
                if(flag == false){
                     writer.println("Token : " + entry.getKey() + " \nValid Anagrams:");
                     writer.flush();
                     flag = true;
                }
                
                writer.println(list.get(j));
            }
            if(flag == false){
                writer.println("NO VALID ANAGRAMS (WORDNET DATABASE) FOUND FOR TOKEN : " + entry.getKey());
                writer.flush();
            }else{
                writer.println("NUMBER OF VALID ANAGRAMS (WORDNET DATABASE) IN ABOVE LIST : " + j);
                writer.flush();
            }
            writer.println("----------");
        }
        
        writer.println("\nTotal Number of tokens including duplicates : " + noOfTokens);
        writer.println("\nSuccessfully printed " + frequencyOrderedList.size() + " unique tokens");
        writer.flush();
    }
}

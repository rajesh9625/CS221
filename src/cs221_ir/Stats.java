//package cs221_ir;
//
//import java.io.BufferedReader;
//import java.io.File;
//import java.io.FileInputStream;
//import java.io.FileNotFoundException;
//import java.io.FileReader;
//import java.io.IOException;
//import java.io.InputStreamReader;
//import java.io.PrintWriter;
//import java.io.UnsupportedEncodingException;
//import java.util.ArrayList;
//import java.util.List;
//import java.util.Map;
//import org.jsoup.Jsoup;
//
//public class Stats {
//
//    static List<String> allTokens = new ArrayList<String>();
//    static long counttext = -1;
//    static String largestTextHref = "";
//    static String line = "";
//
//    public static String getHref(String name) {
//        String value = "";
//        value += name.replace("\\", "/");
//        value = value.split("/STORAGE/WEBDATAHTML/")[1];
//        return "http://www." + value;
//    }
//
//    public static String getOnlyText(String content) {
//        return Jsoup.parse(content).text();
//    }
//
//    public static void calculateStatistics(String path, TokenizerClass objectOfUtilClass) throws FileNotFoundException {
//        File root = new File(path);
//        File[] list = root.listFiles();
//        if (list == null) {
//            System.out.println("WEBDATA IS EMPTY");
//        }
//        String content = "";
//        for (File f : list) {
//            if (f.isDirectory()) {
//                calculateStatistics(f.getAbsolutePath(), objectOfUtilClass);
//            } else {
//                StringBuffer str = new StringBuffer();
//                line = "";
//                FileReader fr = new FileReader(f.getAbsolutePath());
//                BufferedReader br = new BufferedReader(fr);
//                try {
//                    while ((line = br.readLine()) != null) {
//                        str = str.append(" ");
//                        str = str.append(line);
//                    }
//                } catch (IOException ex) {
//                    ex.printStackTrace();
//                }
//                
//                content = getOnlyText(str.toString().toLowerCase());
//                long charCount = 0;
//                
//                List<String> tokenList = new ArrayList<>();
//                String[] listOfTokens;
//                String regExpression = "[^a-zA-Z0-9]+";
//                listOfTokens = content.split(regExpression);
//                int tokenLength = listOfTokens.length;
//
//                for (int j = 0; j < tokenLength; j++) {
//                    if (listOfTokens[j].trim().length() != 0) {
//                        tokenList.add(listOfTokens[j].trim());
//                    }
//
//                }
//                charCount = tokenList.size();
//                if (charCount > counttext) {
//                    counttext = charCount;
//                    largestTextHref = getHref(f.getAbsolutePath());
//                }
//                allTokens.addAll(tokenList);
//            }
//        }
//    }
//
//    public static void main(String[] args) throws Exception {
//        File fp = new File("STATS");
//        fp.mkdir();
//        TokenizerClass objectOfUtilClass = new TokenizerClass();
//        String path = "STORAGE/WEBDATAHTML/";
//        calculateStatistics(path, objectOfUtilClass);
//        PrintWriter writer = null;
//        try {
//            try {
//                writer = new PrintWriter("STATS/LARGEST_TEXT.txt", "UTF-8");
//            } catch (UnsupportedEncodingException ex) {
//                ex.printStackTrace();
//            }
//        } catch (FileNotFoundException ex) {
//        }
//        if (writer != null) {
//            writer.write("URL : " + largestTextHref + " , Count : " + counttext);
//            writer.close();
//        }
//
//        File sf = new File("StopWordList.txt");
//        List<String> stopwords = new ArrayList<String>();
//        stopwords = objectOfUtilClass.tokenizeFile(sf.getAbsolutePath());
//        allTokens.removeAll(stopwords);
//
//        FrequencyOfWords objectOfFrequencyOfWordsClass = new FrequencyOfWords();
//        List<Map.Entry<String, Double>> frequencyOrderedList = objectOfFrequencyOfWordsClass.computeWordFrequencies(allTokens);
//        try {
//            objectOfFrequencyOfWordsClass.print500(frequencyOrderedList);
//        } catch (UnsupportedEncodingException ex) {
//            ex.printStackTrace();
//        }
//
//        ThreeGrams objectOfThreeGram = new ThreeGrams();
//        List<Map.Entry<String, Double>> frequencyOrdered3GramList = objectOfThreeGram.computeThreeGramFrequencies(allTokens);
//        objectOfThreeGram.print20(frequencyOrdered3GramList);
//
//
//        File linksFile = new File("STORAGE/LINKS.txt");
//        URLStatistics a = new URLStatistics();
//        a.runStats(linksFile);
//
//
//
//
//    }
//}

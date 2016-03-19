package cs221_ir;

import java.io.BufferedReader;
import java.io.DataInputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class TokenizerClass {

    public static String getOnlyText(String content) {
        return Jsoup.parse(content).body().text();
    }

    public static ArrayList<String> getAllLinks(String input) throws FileNotFoundException, IOException {
        FileInputStream fstream = new FileInputStream(input);
        DataInputStream in = new DataInputStream(fstream);
        BufferedReader br = new BufferedReader(new InputStreamReader(in));
        String line = "";
        StringBuilder str = new StringBuilder();
        while ((line = br.readLine()) != null) {
            str.append(line.toLowerCase());
        }
        ArrayList<String> urls = new ArrayList<String>();
        Elements links = Jsoup.parse(str.toString()).select("a");
        for (Element e : links) {
            urls.add(e.attr("href"));
        }
        return urls;
    }

    public static String getOnlyAnchors(String content) {
        StringBuilder str = new StringBuilder();
        Elements links = Jsoup.parse(content).select("a");
        for (Element e : links) {
            str.append(e.attr("href"));
            str.append(" ");
            str.append(e.html());
        }
        return str.toString();
    }

    public static String getOnlyTitle(String content) {
        return Jsoup.parse(content).title();
    }

    public List<String> tokenizeFileBody(String fileName) {
        String line = "";
        StringBuilder str = new StringBuilder();
        List<String> listOfAllTokens = new ArrayList<String>();
        File input = new File(fileName);
        String[] listOfTokens;
        try {
            FileInputStream fstream = new FileInputStream(input);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));

            while ((line = br.readLine()) != null) {
                str.append(line.toLowerCase());
            }
            String onlytext = getOnlyText(str.toString());
            String regExpression = "[^a-zA-Z]+";
            listOfTokens = onlytext.split(regExpression);
            int tokenLength = listOfTokens.length;

            for (int j = 0; j < tokenLength; j++) {
                if (listOfTokens[j].trim().length() != 0) {
                    if (listOfTokens[j].trim().equals("studentshow")) {
                        System.out.println("F : " + fileName);
                    }
                    listOfAllTokens.add(listOfTokens[j].trim());
                }

            }

            br.close();
            in.close();
        } catch (Exception e) {
            return listOfAllTokens;
        }

        return listOfAllTokens;
    }

    public List<String> tokenizeFileAnchors(String fileName) {
        String line = "";
        StringBuilder str = new StringBuilder();
        List<String> listOfAllTokens = new ArrayList<String>();
        File input = new File(fileName);
        String[] listOfTokens;
        try {
            FileInputStream fstream = new FileInputStream(input);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));

            while ((line = br.readLine()) != null) {
                str.append(line.toLowerCase());
            }
            String onlytext = getOnlyText(str.toString());
            String regExpression = "[^a-zA-Z]+";
            listOfTokens = onlytext.split(regExpression);
            int tokenLength = listOfTokens.length;

            for (int j = 0; j < tokenLength; j++) {
                if (listOfTokens[j].trim().length() != 0) {
                    if (listOfTokens[j].trim().equals("studentshow")) {
                        System.out.println("F : " + fileName);
                    }
                    listOfAllTokens.add(listOfTokens[j].trim());
                }

            }

            br.close();
            in.close();
        } catch (Exception e) {
            return listOfAllTokens;
        }

        return listOfAllTokens;
    }

    public List<String> tokenizeFileTitle(String fileName) {
        String line = "";
        StringBuilder str = new StringBuilder();
        List<String> listOfAllTokens = new ArrayList<String>();
        File input = new File(fileName);
        String[] listOfTokens;
        try {
            FileInputStream fstream = new FileInputStream(input);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));

            while ((line = br.readLine()) != null) {
                str.append(line.toLowerCase());
            }
            String onlytext = getOnlyText(str.toString());
            String regExpression = "[^a-zA-Z]+";
            listOfTokens = onlytext.split(regExpression);
            int tokenLength = listOfTokens.length;

            for (int j = 0; j < tokenLength; j++) {
                if (listOfTokens[j].trim().length() != 0) {
                    if (listOfTokens[j].trim().equals("studentshow")) {
                        System.out.println("F : " + fileName);
                    }
                    listOfAllTokens.add(listOfTokens[j].trim());
                }

            }

            br.close();
            in.close();
        } catch (Exception e) {
            return listOfAllTokens;
        }

        return listOfAllTokens;
    }

    public List<String> tokenizeFile(String fileName) {
        String line = "";
        StringBuilder str = new StringBuilder();
        List<String> listOfAllTokens = new ArrayList<String>();
        File input = new File(fileName);
        String[] listOfTokens;
        try {
            FileInputStream fstream = new FileInputStream(input);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));

            while ((line = br.readLine()) != null) {
                str.append(line.toLowerCase());
            }
            String onlytext = str.toString();
            String regExpression = "[^a-zA-Z]+";
            listOfTokens = onlytext.split(regExpression);
            int tokenLength = listOfTokens.length;

            for (int j = 0; j < tokenLength; j++) {
                if (listOfTokens[j].trim().length() != 0) {
                    if (listOfTokens[j].trim().equals("studentshow")) {
                        System.out.println("F : " + fileName);
                    }
                    listOfAllTokens.add(listOfTokens[j].trim());
                }

            }

            br.close();
            in.close();
        } catch (Exception e) {
            return listOfAllTokens;
        }

        return listOfAllTokens;
    }

    public void printToken(List<String> tokenList) {
        System.out.println("Printing out tokens : \n");
        PrintWriter writer = null;
        try {
            writer = new PrintWriter("C:\\Users\\Prash\\Documents\\NetBeansProjects\\InformationRetrievalProject1\\src\\informationretrievalproject1\\output1.txt", "UTF-8");
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        } catch (UnsupportedEncodingException ex) {
            Logger.getLogger(FrequencyOfWords.class.getName()).log(Level.SEVERE, null, ex);
        }
        int count = 1;
        for (int i = 0; i < tokenList.size(); i++) {
            writer.println("Token " + count + " : " + tokenList.get(i));
            writer.flush();
            count++;
        }
        writer.println("\nTotal Number of tokens including duplicates : " + tokenList.size());
        writer.flush();
    }
}
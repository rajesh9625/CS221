package cs221_ir;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Collection;
import java.util.List;
import java.util.regex.Pattern;

import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.parser.HtmlParseData;
import edu.uci.ics.crawler4j.url.WebURL;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Set;

public class CrawlerClass extends WebCrawler {

    private String longestTextUrl;
    private long textLengthCounter = -1;
    private HashMap<String, Double> returnMap = new HashMap<>();
    
    public static Collection<String> crawl(String seedURL) {
        return null;
    }
    private final static Pattern FILTERS = Pattern.compile(".*(\\.(css|js|bmp|gif|jpe?g|png|tiff?|mid|mp2|mp3|mp4|wav|avi|mov|mpeg|ram|m4v|pdf|rm|smil|wmv|swf|wma|zip|rar|gz|ico|pfm|c|h|o))$");
    private final static Pattern  FILTERS1 = Pattern.compile(".*[\\?@=].*");
    private static String writedata = null;
    private static String writelinks = null;
    
    public boolean shouldVisit(WebURL url) {
        String href = url.getURL().toLowerCase();
        double countHref = 0;
        if (returnMap.containsKey(href)) {
            countHref = (long) (returnMap.get(href) + 1);
            if(countHref == 6){ //maximum revisit policy 5
                return false;
            }
            returnMap.put(href, countHref);
        } else {
            returnMap.put(href, 1D);
        }
        if (FILTERS.matcher(href).matches()) {
            return false;
        }
        if (href.contains("ftp.ics.uci.edu")) {
            return false;
        }
        if (!href.contains(".ics.uci.edu")) {
            return false;
        }
        if (FILTERS1.matcher(href).matches()) {
            return false;
        }
        return true;
    }

    @Override
    public void visit(Page page) {
        WebURL url = page.getWebURL();
        String href = url.getURL().toLowerCase();
        if (FILTERS.matcher(href).matches()) {
            return;
        }
        if (href.contains("ftp.ics.uci.edu")) {
            return;
        }
        if (!href.contains(".ics.uci.edu")) {
            return;
        }
        if (FILTERS1.matcher(href).matches()) {
            return;
        }
        if (page.getParseData() instanceof HtmlParseData) {
            HtmlParseData htmlParseData = (HtmlParseData) page.getParseData();
            String title = htmlParseData.getTitle();
            String text = htmlParseData.getText();
            String html = htmlParseData.getHtml();
            Set<WebURL> links = htmlParseData.getOutgoingUrls();
            System.out.println(" NOOOO : " + links.size());
            Set<WebURL> linksnew = new HashSet<WebURL>();
            for (WebURL i : links) {
                href = i.getURL().toLowerCase();
                if (FILTERS.matcher(href).matches()) {
                    continue;
                }
                if (href.contains("ftp.ics.uci.edu")) {
                    continue;
                }
                if (!href.contains(".ics.uci.edu")) {
                    continue;
                }
                if (FILTERS1.matcher(href).matches()) {
                    continue;
                }
                linksnew.add(i);
            }
            if(textLengthCounter < text.length()){
                textLengthCounter = text.length();
                longestTextUrl = href;
            }
            if (writedata != null) {
                writeFilesUtility(url, title, text);
                writeFilesUtility2(url, title, html);
            }
            if (writelinks != null) {
                writeAnchorLinks(url, text, html, linksnew);
            }
        }
    }

    private synchronized void writeAnchorLinks(WebURL url, final String text, final String html, final Set<WebURL> links) {
        System.out.println("URL: " + url.getURL());
        System.out.println("Number of outgoing links: " + links.size());
        try {
            FileWriter fWriter = new FileWriter(writelinks, true);
            StringBuilder builder = new StringBuilder(url.getURL());
            builder.append("\t");
            for (WebURL link : links) {
                builder.append(link.getURL());
                builder.append(" ");
            }
            builder.append("\n");
            fWriter.write(builder.toString());
            fWriter.close();
        } catch (IOException e) {
            System.err.println("Error when writing " + url.getURL());
            e.printStackTrace();
        }
    }

    private synchronized void writeFilesUtility(WebURL url, String title, String text) {
        try {
            String path = url.getURL().substring("http://".length());
            if(path.contains("www.ics.uci.edu")){
                path = path.substring("www.".length());
            }
            
            File file = new File(writedata + path);
            
            if (file.isDirectory()) {
                file = new File(writedata + path + "index.txt");
            } else if (url.getPath().lastIndexOf('.') < url.getPath().lastIndexOf('/')) {
                file = new File(writedata + path + "/index.txt");
            }
            if (!file.exists()) {
                File parent = new File(file.getParent());
                if (!parent.exists()) {
                    parent.mkdirs();
                }
            }
            FileWriter fWriter = new FileWriter(file);
            if (title != null) {
                fWriter.write(title);
            }
            if (text != null) {
                fWriter.write(text);
            }
            fWriter.close();
        } catch (Exception e) {
            System.err.println("Error when writing " + url);
            e.printStackTrace();
        }
    }
    
    private synchronized void writeFilesUtility2(WebURL url, String title, String text) {
        try {
            String path = url.getURL().substring("http://".length());
            if(path.contains("www.ics.uci.edu")){
                path = path.substring("www.".length());
            }
            
            File file = new File("STORAGE/WEBDATAHTML/" + path);
            
            if (file.isDirectory()) {
                file = new File("STORAGE/WEBDATAHTML/" + path + "index.txt");
            } else if (url.getPath().lastIndexOf('.') < url.getPath().lastIndexOf('/')) {
                file = new File("STORAGE/WEBDATAHTML/" + path + "/index.txt");
            }
            if (!file.exists()) {
                File parent = new File(file.getParent());
                if (!parent.exists()) {
                    parent.mkdirs();
                }
            }
            FileWriter fWriter = new FileWriter(file);
            if (title != null) {
                fWriter.write(title);
            }
            if (text != null) {
                fWriter.write(text);
            }
            fWriter.close();
        } catch (Exception e) {
            System.err.println("Error when writing " + url);
            e.printStackTrace();
        }
    }

    public static void setLogFile(String pathname) {
        writedata = pathname;
    }

    public static void setLinkFile(String pathname) {
        writelinks = pathname;
    }

    
}

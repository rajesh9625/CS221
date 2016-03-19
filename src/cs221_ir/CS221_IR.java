//package cs221_ir;
//import edu.uci.ics.crawler4j.crawler.CrawlConfig;
//import edu.uci.ics.crawler4j.crawler.CrawlController;
//import edu.uci.ics.crawler4j.fetcher.PageFetcher;
//import edu.uci.ics.crawler4j.robotstxt.RobotstxtConfig;
//import edu.uci.ics.crawler4j.robotstxt.RobotstxtServer;
//public class CS221_IR {
//    
//    public class Configuration {
//
//        public static final String crawlStorageFolder = "./STORAGE/crawler/config";
//        public static final String webdata = "./STORAGE/WEBDATA/";
//        public static final String linksTextFile = "./STORAGE/LINKS.txt";
//        public static final String agentName = "IR W16 WebCrawler 60804572/62882932/51884271";
//        public static final int politenessDelay = 400;
//    }
//
//    public static void main(String[] args) throws Exception {
//        String crawlStorageFolder = Configuration.crawlStorageFolder;
//        CrawlConfig config = new CrawlConfig();
//        config.setCrawlStorageFolder(crawlStorageFolder);
//        config.setPolitenessDelay(Configuration.politenessDelay);
//        config.setMaxDepthOfCrawling(20);
//        config.setMaxPagesToFetch(-1);
//        config.setResumableCrawling(true);
//        config.setConnectionTimeout(100000);
//        PageFetcher pageFetcher = new PageFetcher(config);
//        RobotstxtConfig robotstxtConfig = new RobotstxtConfig();
//        robotstxtConfig.setUserAgentName(Configuration.agentName);
//        RobotstxtServer robotstxtServer = new RobotstxtServer(robotstxtConfig, pageFetcher);
//        CrawlController controller = new CrawlController(config, pageFetcher, robotstxtServer);
//        controller.addSeed("http://www.ics.uci.edu/");
//        CrawlerClass.setLogFile(Configuration.webdata);
//        CrawlerClass.setLinkFile(Configuration.linksTextFile);
//        controller.start(CrawlerClass.class, 8);
//    }
//}



import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;
import java.util.concurrent.CompletableFuture;
import java.util.concurrent.CopyOnWriteArraySet;
import java.util.concurrent.ExecutionException;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import java.util.stream.Collectors;

public class WikiFunctions{
    private static final String BASE_LINK = "https://pl.wikipedia.org/wiki/";

    public static void main(String[] args) throws ExecutionException, InterruptedException {
        String link = "Mariusz";

        Set<String> links = new HashSet<>();
        links.add(link);

        Set<String> results = new HashSet<>(links);

        final Set<String> result = new CopyOnWriteArraySet<>();

        CompletableFuture[] cfs = links.stream()
                .map(l -> getPageAsync(l))
                .map(cf -> cf.thenApply(p -> findLinks(p)))
                .map(cf -> cf.thenAccept(l ->result.addAll(l)))
                .toArray(j -> new CompletableFuture[j]);

        CompletableFuture.allOf(cfs).get();

        links = result.stream()
                .filter(l -> !results.contains(l))
                .collect(Collectors.toSet());

        results.addAll(result);

    }

    public static String getPage(String link) {
        System.out.println(link);

        try {

            URL url = new URL(BASE_LINK + link);
            StringBuilder sb = new StringBuilder();

            try (InputStream is = url.openStream(); BufferedReader br = new BufferedReader(new InputStreamReader(is))) {

                String line = null;
                while ((line = br.readLine()) != null) {
                    sb.append(line).append("\n");
                }

            }
            //System.out.println(sb.toString());
            return sb.toString();

        } catch (Exception e) {
            e.printStackTrace();
            return null;
        }
    }

    public static List<String> findLinks(String page) {

        List<String> links = new ArrayList<>();
        if (page == null) {
            return links;
        }

        try {
            Pattern p1 = Pattern.compile("href=\"/wiki/.+?\"");
            Matcher m1 = p1.matcher(page);
            while (m1.find()) {
                String link = m1.group();
                link = link.replaceAll("href=\"/wiki/", "").replaceAll("\"", "");

                System.out.println("link - " + link);
                links.add(link);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return links;
    }

    static CompletableFuture<String> getPageAsync(String link) {
        return CompletableFuture.supplyAsync(() -> getPage(link));
    }
}
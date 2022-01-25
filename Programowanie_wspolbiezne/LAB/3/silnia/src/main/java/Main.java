import java.time.Duration;
import java.time.Instant;
import java.math.BigInteger;
import java.util.Optional;
import java.util.stream.*;

public class Main {
    public static void main(String[] args) {
        Instant start;
        Instant end;
        int rangeStart = 1;
        int rangeStop = 100000;
        System.out.println("Silnia: "+rangeStop);
        System.out.println("Stream: ");
        start = Instant.now();
        CountStrong(rangeStart, rangeStop);
        end = Instant.now();
        System.out.println("Czas: " + Duration.between(start, end).toMillis()
                + " milliseconds.");
        System.out.println("Parallel stream: ");
        start = Instant.now();
        CountParallelStrong(rangeStart, rangeStop);
        end = Instant.now();
        System.out.println("Czas: " + Duration.between(start, end).toMillis()
                + " milliseconds.");
    }

    private static Optional<BigInteger> CountStrong(int rangeStart, int rangeStop)
    {
        return IntStream.rangeClosed(rangeStart, rangeStop)
                .mapToObj(BigInteger::valueOf)
                .reduce((x, y) -> x.multiply(y));
    }
    private static Optional<BigInteger> CountParallelStrong(int rangeStart, int
            rangeStop) {
        return IntStream.rangeClosed(rangeStart, rangeStop)
                .parallel()
                .mapToObj(BigInteger::valueOf)
                .reduce((x, y) -> x.multiply(y));
    }
}

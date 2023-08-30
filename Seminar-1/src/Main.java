import InMemoryModel.ModelStore;

public class Main {

    public static void main(String[] args) {

        ModelStore modelStore = new ModelStore(changeObserver, points);
    }
}
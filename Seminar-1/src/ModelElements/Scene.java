package ModelElements;

public class Scene {

    public int id;
    public PoligonalModel models;
    public Flash flashes;
    public Camera cameras;

    public Scene(PoligonalModel models, Flash flashes, Camera cameras) {
        this.models = models;
        this.flashes = flashes;
        this.cameras = cameras;
    }

    public Type method1(Type type) {

        return type;
    }

    public Type method2(Type type1, Type type2) {

        return type1;
    }
}

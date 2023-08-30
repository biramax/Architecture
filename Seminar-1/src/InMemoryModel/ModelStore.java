package InMemoryModel;

import ModelElements.*;

public class ModelStore implements IModelChanger {

    public PoligonalModel models;
    public Scene scenes;
    public Flash flashes;
    public Camera cameras;
    private IModelChangeObserver changeObserver;

    public ModelStore(IModelChangeObserver changeObserver, Point3D points) {
        this.changeObserver = changeObserver;
        this.models = new PoligonalModel(new Poligon(points));
        this.cameras = new Camera();
        this.flashes = new Flash();
        this.scenes = new Scene(this.models, this.flashes, this.cameras);
    }

    public Scene getScena(int id) {
        return this.scenes;
    }

    @Override
    public void notifyChange(IModelChanger sender) {

    }
}

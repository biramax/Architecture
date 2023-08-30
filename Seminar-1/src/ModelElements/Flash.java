package ModelElements;

public class Flash {

    public Point3D location;
    public Angle3D angle;
    public Color color;
    public float Power;

    public void rotate(Angle3D angle) {
        this.angle = angle;
    }

    public void move(Point3D location) {
        this.location = location;
    }
}

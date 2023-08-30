package ModelElements;

public class Camera {

    public Point3D location;
    public Angle3D angle;

    public void rotate(Angle3D angle) {
        this.angle = angle;
    }

    public void move(Point3D location) {
        this.location = location;
    }
}

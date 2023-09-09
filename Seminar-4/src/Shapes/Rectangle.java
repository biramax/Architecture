package Shapes;

import java.util.HashMap;
import java.util.Map;

public class Rectangle implements IShape {

    private double width;
    private double height;

    public Rectangle(double width, double height) {
        this.width = width;
        this.height = height;
    }

    public double getWidth() {
        return width;
    }

    public double getHeight() {
        return height;
    }

    @Override
    public String getName() {
        return "прямоугольник";
    }

    @Override
    public double getArea() {
        return width * height;
    }

    @Override
    public double getPerimeter() {
        return (2 * width) + (2 * height);
    }

    @Override
    public Map<String, String> getParameters() {
        return new HashMap<String, String>(Map.of(
                "Длина", Double.toString(this.getWidth()),
                "Ширина", Double.toString(this.getHeight())
        ));
    }
}

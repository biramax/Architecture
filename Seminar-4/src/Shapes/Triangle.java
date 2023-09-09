package Shapes;

import java.util.HashMap;
import java.util.Map;

public class Triangle implements IShape {
    private double a;
    private double b;
    private double c;

    public Triangle(double a, double b, double c) {
        this.a = a;
        this.b = b;
        this.c = c;
    }

    public double getA() {
        return a;
    }

    public double getB() {
        return b;
    }

    public double getC() {
        return c;
    }

    @Override
    public String getName() {
        return "треугольник";
    }

    @Override
    public double getArea() {
        double s = (a + b + c) / 2.0;
        return Math.sqrt(s * (s - a) * (s - b) * (s - c));
    }

    @Override
    public double getPerimeter() {
        return a + b + c;
    }

    @Override
    public Map<String, String> getParameters() {
        return new HashMap<String, String>(Map.of(
                "Стороны", this.getA() + ", " + this.getB() + ", " + this.getC()
        ));
    }
}

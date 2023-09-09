package Shapes;
// Интерфейс для геометрических фигур

import java.util.Map;

public interface IShape {

    // Название фигуры
    String getName();

    // Площадь фигуры
    double getArea();

    // Периметр фигуры
    double getPerimeter();

    Map<String, String> getParameters();
}

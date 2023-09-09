import Shapes.Circle;
import Shapes.Rectangle;
import Shapes.Triangle;

public class Main {
    public static void main(String[] args) {

        GeometryFigure figureBox = new GeometryFigure();

        // Добавляем круг
        Circle circle = new Circle(10);
        figureBox.add(circle);

        // Добавляем прямоугольник
        Rectangle rectangle = new Rectangle(20, 10);
        figureBox.add(rectangle);

        // Добавляем треугольники
        Triangle triangle1 = new Triangle(5, 7, 9);
        figureBox.add(triangle1);
        Triangle triangle2 = new Triangle(15, 17, 19);
        figureBox.add(triangle2);

        // Выводим информацию о всех имеющихся в figureBox фигурах
        figureBox.getAllFiguresInfo();

        // Выводим информацию о фигуре по её номеру в figureBox
        figureBox.getFigureInfo(2);

        // Удаляем фигуру по её номеру в figureBox
        figureBox.delFigure(1);

        // Выводим фигуры по искомому названию
        figureBox.searchFigure("Треугольник");
    }
}

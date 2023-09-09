import Shapes.IShape;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;

// Найти первую фигуру, последнюю, найти по номеру, добавить, удалить

public class GeometryFigure {

    static private List<IShape> toolbox;

    public GeometryFigure() {
        toolbox = new ArrayList<IShape>();
    }

    // Добавление новой фигуры
    public void add(IShape figure) {
        toolbox.add(figure);
    }

    // Удаление фигуры по её номеру
    public void delFigure(int num) {
        if (num >= toolbox.size()) {
            System.out.println("Фигуры по запрошенному номеру нет.");
            return;
        }
        IShape figure = toolbox.remove(num);
        System.out.println("Удалена фигура -----------------");
        printFigure(figure);
    }

    // Поиск фигуры по названию
    public void searchFigure(String name) {
        int i = 0;
        boolean found = false;
        String nameFormat = name.toLowerCase();
        for (IShape figure : toolbox) {
            if (nameFormat.equals(figure.getName().toLowerCase())) {
                found = true;
                System.out.println(i + " --------------------------");
                printFigure(figure);
            }
            i ++;
        }
        if (!found)
            System.out.println("Фигуры с названием \"" + name + "\" не найдено");
    }

    // Отображаем информацию о фигуре по её номеру
    public void getFigureInfo(int num) {
        if (num >= toolbox.size()) {
            System.out.println("Фигуры по запрошенному номеру нет.");
            return;
        }
        IShape figure = toolbox.get(num);
        printFigure(figure);
    }

    // Отображаем информацию о всех фигурах
    public void getAllFiguresInfo() {
        int i = 0;
        for (IShape figure : toolbox) {
            System.out.println((i ++) + " --------------------------");
            printFigure(figure);
        }
        System.out.println("----------------------------");
    }

    //  Вывод информации о фигуре в консоль
    private void printFigure(IShape figure) {

        Map<String, String> parametersMap = figure.getParameters();
        String parametersString = "";
        for (var item : parametersMap.entrySet())
            parametersString += item.getKey() + ": " + item.getValue() + "\n";

        System.out.println(
            "Название фигуры: " + figure.getName() + "\n" +
            parametersString +
            "Площадь фигуры: "  + (Math.round(figure.getArea() * 100) / 100.0) + "\n" +
            "Периметр фигуры: " + (Math.round(figure.getPerimeter() * 100) / 100.0)
        );
    }
}

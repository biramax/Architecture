package Core;

import Abstractions.ItemGenerator;

import Rewards.Gold.GoldGenerator;
import Rewards.Silver.SilverGenerator;

import java.util.ArrayList;
import java.util.List;

import java.util.Random;
import java.util.Scanner;

public class Core {

    // Логика игры
    public void run() {

        List<ItemGenerator> generatorList = new ArrayList<>();

        //generatorList.add(new GoldGenerator());
        //generatorList.add(new SilverGenerator());
        //ItemGenerator myGenerator = generatorList.get(1);
        //System.out.println(myGenerator.openReward());

        Scanner sc = new Scanner(System.in);
        ItemGenerator myGenerator;
        int i = 0;

        while (true) {

            // Разделим выдачу серебра и золота в пропорции 80/20
            // Для этого генерируем число от 0 до 9. Если "выпадет" число меньше 8, то будем выдавать серебро.
            Random random = new Random();
            int randomNumber = random.nextInt(10);

            generatorList.add(randomNumber < 8 ? new SilverGenerator() : new GoldGenerator());

            myGenerator = generatorList.get(i);

            System.out.println((i + 1) + ". Ваша награда: " + myGenerator.openReward());
            System.out.println();

            System.out.printf("Продолжить (Y/N)? ");

            if (sc.nextLine().toLowerCase().equals("n")) {
                break;
            }
            System.out.println();

            i++;
        }
    }
}

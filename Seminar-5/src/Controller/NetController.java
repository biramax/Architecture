package Controller;

import Data.ICamerasRepository;
import Data.ICurrentTrafficRepository;
import Data.IRoadsRepository;

// Сетевой контроллер
// Реализует методы от интерфейса получения и обработки данных о дорогах, пробках, камерах
// Передаёт данные в контроллер маршрута

public class NetController implements IRoadsRepository, ICurrentTrafficRepository, ICamerasRepository {
}

package FuelStation;
// Заправочная станция

public interface IFuelStation {

    // Заправка топливом
    void refuel();

    // Методы протирки лобового стекла, фар и зеркал перенёс в отдельный интерфейс IFuelStationCleaning
}

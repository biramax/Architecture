package InMemoryModel;

public interface IModelChanger {

    // Изменяет состояние
    void notifyChange(IModelChanger sender);
}

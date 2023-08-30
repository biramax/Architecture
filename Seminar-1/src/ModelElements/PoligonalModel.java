package ModelElements;

public class PoligonalModel {

    public Poligon poligons;
    public Texture textures;

    public PoligonalModel(Poligon poligon) {
        this.poligons = poligon;
    }

    public void setTexture(Texture texture) {
        this.textures = texture;
    }

    public Texture getTexture() {
        return this.textures;
    }
}

class Hassan {
    public static void main(String[] args) {
        new Cook().Bean().Coffee();
    }
}

class Cook {
    Cook Bean() {
        return this;
    }

    Cook Coffee() {
        System.out.println("Need some coffee before cooking");
        return this;
    }
}
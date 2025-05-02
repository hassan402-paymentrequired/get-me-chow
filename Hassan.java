class Hassan {
    public static void main(String[] args) {
        String letCook = new Cook().Bean();
        System.out.println(letCook);
    }
}

class Cook {
    String Bean() {
        return "Let's Cook";
    }
}
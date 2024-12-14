export class Character {
    constructor(name, charclass, life, age, gender, slot1, slot2) {
        this.name = name;
        this.class = charclass;
        this.life = life;
        this.age = age;
        this.gender = gender;
        this.slot1 = slot1;
        this.slot2 = slot2;
    }

    status() {
        console.log(`
        Name: ${this.name}{
            Class: ${this.class}
            Life: ${this.life}
            Age: ${this.age}
            Gender: ${this.gender}
            slot1: ${this.slot1}
            Slot2: ${this.slot2}
        }`);
    }
}

export class warriorCharacter extends Character {  
    constructor(name, charclass, life, age, gender, slot1, slot2, specialAbility) {
        super(name,
            "Warrior",
            life,
            age,
            gender,
            slot1,
            slot2); 
        this.specialAbility = "Shield Bash";
    }

    specialAbility() {
        console.log(`Special Ability: ${this.specialAbility}`);
    }
}



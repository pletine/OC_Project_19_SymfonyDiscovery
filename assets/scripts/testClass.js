export default class {
    constructor(name) {
        this.name = name;
    }

    getName() {
        return this.name;
    }

    alertName() {
        alert(this.name);
    }
}
#include <iostream>
#include <string>
using namespace std;

void calculate(double a, double b, string ex)
{
    double sum;
    if (ex == "+")
    {
        sum = a + b;
        cout << sum;
    }
    else if (ex == "-")
    {
        sum = a - b;
        cout << sum;
    }
    else if (ex == "*")
    {
        sum = a * b;
        cout << sum;
    }
    else if (ex == "/")
    {
        sum = a / b;
        cout << sum;
    }
    else
    {
        cout << "Por favor digite expressoes possiveis (+, -, *, /)";
    };
}

void getNumbers()
{
    double num1;
    double num2;
    string ex;

    cout << "Digite um numero, e depois uma expressão aritimetica e apos outro numero \n";
    cin >> num1;

    cin >> ex;

    cin >> num2;

    calculate(num1, num2, ex);
}

int main()
{
    getNumbers();
    return 0;
}
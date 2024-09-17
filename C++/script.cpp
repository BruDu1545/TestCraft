#include <iostream>

int main(){
    int num = 9;
    
    for (int i = 0; i <= 10; i++){
        int result = num*i;
        std::cout << num << " X " << i << " = " << result << std::endl;
    }
    return 0;
}
// SPDX-License-Identifier: MIT
pragma solidity ^0.8.10;

contract HelloWorld {
    fallback(bytes calldata) external returns(bytes memory) {
        return bytes("hello world");
    }
}
